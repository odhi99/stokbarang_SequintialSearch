@extends('layouts.master')

@section('title', 'Barang Masuk')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">@yield('title')</h3>
                    <ul class="breadcrumb">
                        <li class="me-1">Admin /</li>
                        <li class="breadcrumb-item"><a href="">@yield('title')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-sm-12 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <form action="{{ route('print') }}" method="POST">
                        @csrf
                        <input type="hidden" name="startDatePrint" value="{{ $startdate ? $startdate : '' }}">
                        <input type="hidden" name="endDatePrint" value="{{ $enddate ? $enddate : '' }}">

                        <button type="submit" class="btn btn-outline-primary mb-3">Print</button>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('filter') }}" class="mb-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Keluar</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->stok->namabarang }}</td>
                                        <td>{{ $value->qty }}</td>
                                        <td>{{ number_format($value->stok->harga) }}</td>
                                        <td>{{ number_format($value->stok->harga * $value->qty) }}</td>
                                        <td>
                                            <div class="actions">
                                                {{-- <a href="{{ route('masuk.edit') }}"
                                                    class="btn btn-sm btn-outline-success me-2">
                                                    <i class="feather-edit"></i>
                                                </a> --}}
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus?')"><i
                                                            class="fa fa-eraser"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Total Keseluruhan</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="3">Rp {{ number_format($total) }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
