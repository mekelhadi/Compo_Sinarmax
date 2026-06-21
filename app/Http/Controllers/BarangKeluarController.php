<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->orderBy('created_at', 'desc')->get();
        $barangs = Barang::orderBy('nama_barang')->get();
        return view('barang-keluar.index', compact('barangKeluars', 'barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        if ($barang->stok < $validated['jumlah']) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi. Stok tersedia: ' . $barang->stok]);
        }

        $barang->decrement('stok', $validated['jumlah']);

        BarangKeluar::create($validated);

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dicatat.');
    }

    public function destroy($id)
    {
        $barangKeluar = BarangKeluar::with('barang')->findOrFail($id);
        $barang = $barangKeluar->barang;

        if ($barang) {
            $barang->increment('stok', $barangKeluar->jumlah);
        }

        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
