@extends('layouts.master')

@section('title', 'Edit Stok')

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
                    <form method="POST" action="{{ route('stok.update', $data->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Nama Barang <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" id="namabarang" name="namabarang"
                                        value="{{ old('namabarang', $data->namabarang) }}"
                                        placeholder="Masukan Nama Barang">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>deskripsi<span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" id="deskripsi" name="deskripsi"
                                        value="{{ old('deskripsi', $data->deskripsi) }}" placeholder="masukan deskripsi">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Stok<span class="login-danger">*</span></label>
                                    <input class="form-control" type="number" id="stok" name="stok"
                                        value="{{ old('stok', $data->stok) }}" placeholder="masukan stok">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Harga<span class="login-danger">*</span></label>
                                    <input class="form-control" type="number" id="harga" name="harga"
                                        value="{{ old('harga', $data->harga) }}" placeholder="masukan harga">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                <a href="{{ route('stok') }}" class="btn btn-outline-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
