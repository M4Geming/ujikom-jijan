<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::latest()->paginate(2);

        return view('menuAdmin.produk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_name' => 'required',
        ]);

        Produk::create([
            'produk_name' => $request->produk_name,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
        ]);

        return redirect()->route('produk.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_name' => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        $stok_baru = $produk->stok + $request->stok_tambahan;

        $produk->update([
            'produk_name' => $request->produk_name,
            'harga' => $request->harga,
            'stok' => $stok_baru,
            'diskon' => $request->diskon,
        ]);

        return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus.');
    }
}
