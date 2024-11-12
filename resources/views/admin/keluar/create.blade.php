@extends('layouts.master')

@section('title', 'Menambah Barang Keluar')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">@yield('title')</h3>
                    <ul class="breadcrumb">
                        <li class="me-1">Admin /</li>
                        <li class="breadcrumb-item"><a href="{{ route('keluar') }}">@yield('title')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-sm-12 col-12 d-flex">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('keluar.store') }}">
                        @csrf
                        <div class="row">

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Nama barang<span class="login-danger">*</span></label>
                                    <select name="id_barang" id="idbarang" class="form-control">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->id }}">{{ $item->namabarang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Jumlah <span class="login-danger">*</span></label>
                                    <input class="form-control" type="number" id="jumlah" name="jumlah"
                                        placeholder="Quantity">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                <a href="" class="btn btn-outline-danger">Batal</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
