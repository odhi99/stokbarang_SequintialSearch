<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;
use App\Models\Masuk;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Masuk::with('stok')->get();
        return view('admin.masuk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Stok::all();
        return view('admin.masuk.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        Masuk::create([
            'id_barang' => $request->id_barang,
            'keterangan' => $request->keterangan,
            'qty' => $request->jumlah

        ]);

        $stok = Stok::findOrFail($request->id_barang);
        $stok->update([
            'stok' => $stok->stok + $request->jumlah
        ]);
        return redirect()->route('masuk')->with('success', 'Barang ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Masuk::findOrFail($id);
        $data->delete();
        return redirect()->route('masuk')->with('success', 'berhasil Hapus Data.');
    }
}
