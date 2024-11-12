<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $stok = DB::table('stoks')->count();
        $barangMasuk = DB::table('masuks')->count();
        $barangKeluar = DB::table('keluars')->count();



        return view('admin.dashboard', ['stok' => $stok, 'barangMasuk' => $barangMasuk, 'barangKeluar' => $barangKeluar]);
    }
}
