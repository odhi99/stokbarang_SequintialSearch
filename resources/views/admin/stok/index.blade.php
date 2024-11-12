@extends('layouts.master')

@section('title', 'Stok Barang')

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
                    <a href="{{ route('stok.create') }}" class="btn btn-outline-primary mb-3">+ Tambah Data</a>

                    <!-- Form Pencarian -->
                    <form action="{{ route('stok') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari barang..."
                                value="{{ old('search', $searchTerm ?? '') }}">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
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

                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($filteredData as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->namabarang }}</td>
                                        <td>{{ $value->deskripsi }}</td>
                                        <td>{{ $value->stok }}</td>
                                        <td>{{ $value->harga }}</td>
                                        <td>
                                            <div class="actions">
                                                <a href="{{ route('stok.edit', $value->id) }}"
                                                    class="btn btn-sm btn-outline-success me-2">
                                                    <i class="feather-edit"></i>
                                                </a>

                                                <form action="{{ route('stok.destroy', $value->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus?')">
                                                        <i class="fa fa-eraser"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
