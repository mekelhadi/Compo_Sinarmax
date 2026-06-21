<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with('barang')->orderBy('created_at', 'desc')->get();
        $barangs = Barang::orderBy('nama_barang')->get();
        return view('barang-masuk.index', compact('barangMasuks', 'barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);
        $barang->increment('stok', $validated['jumlah']);

        BarangMasuk::create($validated);

        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil dicatat.');
    }

    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::with('barang')->findOrFail($id);
        $barang = $barangMasuk->barang;

        if ($barang) {
            $barang->decrement('stok', $barangMasuk->jumlah);
            if ($barang->stok < 0) {
                $barang->update(['stok' => 0]);
            }
        }

        $barangMasuk->delete();

        return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
