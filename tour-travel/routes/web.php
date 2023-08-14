<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\DaftarPaketController;

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

Route::get('/', function () {
    return view('welcome');
});

route::middleware(['auth'])->group(function(){
    Route::resource('dashboard-admin', DashboardAdminController::class);
    Route::resource('objek-wisata', ObjekWisataController::class);
    Route::post('/objek-wisata/EditForm', [ObjekWisataController::class, 'EditForm'])->name('objek-wisata.EditForm');
    
    Route::resource('destinasi', DestinasiController::class);
    Route::post('/destinasi/EditForm', [DestinasiController::class, 'EditForm'])->name('destinasi.EditForm');
    
    Route::resource('daftar-paket', DaftarPaketController::class);
    Route::post('/daftar-paket/store', [DaftarPaketController::class, 'store'])->name('daftar-paket.store');
    Route::get('/daftar-paket/detail/{id}', [DaftarPaketController::class, 'show'])->name('daftar-paket.detail');
    
});


// route::get('/dashboard-admin', [DashboardAdminController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
