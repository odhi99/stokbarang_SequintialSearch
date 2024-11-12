<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari request
        $searchTerm = $request->input('search');

        // Ambil semua data stok
        $data = Stok::all();
        $filteredData = $data; // Inisialisasi dengan semua data

        // Jika ada parameter pencarian
        if ($searchTerm) {
            // Cek apakah pencarian adalah angka untuk harga atau stok
            if (is_numeric($searchTerm)) {
                // Mencari berdasarkan harga atau stok
                $filteredData = Stok::where('harga', $searchTerm)
                    ->orWhere('stok', $searchTerm)
                    ->get();
            } else {
                // Sequential Search: mencari barang yang namanya atau deskripsinya sesuai dengan input pencarian
                $filteredData = $this->sequentialSearch($data, $searchTerm);
            }
        }

        // Menampilkan data hasil pencarian atau semua data jika tidak ada pencarian
        return view('admin.stok.index', compact('filteredData', 'searchTerm', 'data'));
    }

    /**
     * Melakukan pencarian menggunakan algoritma Sequential Search.
     */
    private function sequentialSearch($data, $searchTerm)
    {
        $filteredData = [];

        // Sequential Search: mencari barang yang namanya atau deskripsinya sesuai dengan input pencarian
        foreach ($data as $item) {
            if (stripos($item->namabarang, $searchTerm) !== false || stripos($item->deskripsi, $searchTerm) !== false) {
                $filteredData[] = $item;
            }
        }

        return $filteredData;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namabarang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        Stok::create($validatedData);

        return redirect()->route('stok')->with('success', 'Stok berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Stok::findOrFail($id);
        return view('admin.stok.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'namabarang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $data = Stok::findOrFail($id);
        $data->update($validatedData);

        return redirect()->route('stok')->with('success', 'Stok berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Stok::findOrFail($id);
        $data->delete();
        return redirect()->route('stok')->with('success', 'Stok berhasil dihapus.');
    }
}
