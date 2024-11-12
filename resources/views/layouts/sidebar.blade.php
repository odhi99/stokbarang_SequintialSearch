{{-- @php
    use Illuminate\Support\Str;
@endphp --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="feather-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('stok') }}">
                        <i class="fas fa-shield-alt"></i>
                        <span>Stok Barang</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('masuk') }}">
                        <i class="fas fa-arrow-right"></i>
                        <span>Barang Masuk</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('keluar') }}">
                        <i class="fa fa-arrow-left"></i>
                        <span>Barang Keluar</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('report') }}">
                        <i class="fa fa-list"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
