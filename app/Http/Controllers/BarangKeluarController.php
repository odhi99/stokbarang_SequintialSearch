<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Stok;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Keluar::with('stok')->get();
        return view('admin.keluar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Stok::all();
        return view('admin.keluar.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        Keluar::create([
            'id_barang' => $request->id_barang,
            'qty' => $request->jumlah

        ]);

        $stok = Stok::findOrFail($request->id_barang);
        $stok->update([
            'stok' => $stok->stok - $request->jumlah
        ]);
        return redirect()->route('keluar')->with('success', 'Barang dikurangi.');
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
        //
    }
}
