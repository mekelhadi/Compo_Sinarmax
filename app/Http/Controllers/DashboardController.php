<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalStok = Barang::sum('stok');
        $totalMasuk = BarangMasuk::sum('jumlah');
        $totalKeluar = BarangKeluar::sum('jumlah');

        $barangs = Barang::orderBy('nama_barang')->get();

        return view('dashboard', compact(
            'totalBarang', 'totalStok', 'totalMasuk', 'totalKeluar', 'barangs'
        ));
    }
}
