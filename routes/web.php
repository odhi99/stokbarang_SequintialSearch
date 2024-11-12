<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StokController;
use App\Models\Stok;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'auth'])->name('auth')->middleware('guest');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');




Route::group([
    'middleware' => ['auth'],
    'namespace' => 'App\Http\Controllers',
    'prefix' => '/',
], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('stok', StokController::class)->only(['index', 'update', 'show', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'stok',
        'create' => 'stok.create',
        'store' => 'stok.store',
        'edit' => 'stok.edit',
        // 'show' => 'stok.show',
    ]);

    Route::resource('masuk', BarangMasukController::class)->only(['index', 'update', 'show', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'masuk',
        'create' => 'masuk.create',
        'store' => 'masuk.store',
    ]);

    Route::resource('keluar', BarangKeluarController::class)->only(['index', 'update', 'show', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'keluar',
        'create' => 'keluar.create',
        'store' => 'keluar.store',
    ]);

    Route::resource('report', ReportController::class)->only(['index', 'update', 'show', 'edit', 'store', 'destroy', 'create'])->names([
        'index' => 'report',

    ]);

    Route::post('/print', [ReportController::class, 'print'])->name('print');
    Route::post('/filter', [ReportController::class, 'filter'])->name('filter');
});
