<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data Keluar beserta relasi Stok
        $data['data'] = Keluar::with('stok')->get();

        // Mengatur tanggal awal dan akhir
        $data['startdate'] = Carbon::now()->format('Y-m-d');
        $data['enddate'] = Carbon::now()->format('Y-m-d');

        // Menghitung total keseluruhan dari semua item menggunakan accessor 'total'
        $data['total'] = $data['data']->sum('total');

        // Mengirim data ke view
        return view('admin.report.index', $data);
    }

    public function print(Request $request)
    {
        // Mengambil input tanggal dari request
        $startDate = $request->input('startDatePrint');
        $endDate = $request->input('endDatePrint');

        $data['startdate'] = $startDate;
        $data['enddate'] = $endDate;


        // Tambah 1 hari pada end_date menggunakan Carbon
        if ($endDate) {
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->addDay()->format('Y-m-d');
        }

        // Query untuk menyeleksi data berdasarkan tanggal
        $data['data'] = Keluar::whereBetween('created_at', [$startDate, $endDate])->get();

        foreach ($data['data'] as $item) {
            $total = $item->qty * $item->stok->harga;

            $item->total = $total;
        }

        $data['total'] = $data['data']->sum('total');

        // dd($data);

        return view('admin.report.print', $data);
    }

    public function filter(Request $request)
    {

        // Mengambil input tanggal dari request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data['startdate'] = $startDate ? $startDate : Carbon::now()->format('Y-m-d');
        $data['enddate'] = $endDate ? $endDate : Carbon::now()->format('Y-m-d');

        // dd($data);


        // Tambah 1 hari pada end_date menggunakan Carbon
        if ($endDate) {
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->addDay()->format('Y-m-d');
        }

        // Query untuk menyeleksi data berdasarkan tanggal
        $data['data'] = Keluar::whereBetween('created_at', [$startDate, $endDate])->get();

        foreach ($data['data'] as $item) {
            $total = $item->qty * $item->stok->harga;

            $item->total = $total;
        }

        $data['total'] = $data['data']->sum('total');
        return view('admin.report.index', $data);
    }
}
