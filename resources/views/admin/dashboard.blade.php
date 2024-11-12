@extends('layouts.master')

@section('title', 'dashboard')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">{{ Auth::user()->name }}</h3>
                    <ul class="breadcrumb">
                        <li>Admin /</li>
                        <li class="breadcrumb-item"> <a href="">@yield('title')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Stok Barang</h6>
                            <h3>{{ $stok }}</h3>
                        </div>
                        {{-- <div class="db-icon">
                            <img src="{{ asset('assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon">
                        </div> --}}
                        <div class="col-auto">
                            <i class="fas fa-database fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Barang Masuk</h6>
                            <h3>{{ $barangMasuk }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-arrow-right fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Barang Keluar</h6>
                            <h3>{{ $barangKeluar }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-arrow-left fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
