<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\LamaHariController;
use App\Http\Controllers\IncludeItemController;
use App\Http\Controllers\WhatBringController;
use App\Http\Controllers\GeneralTermController;
use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\DaftarPaketController;

use App\Http\Controllers\DestinationController;

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
    return view('enduser.home');
});

route::middleware(['auth'])->group(function(){
    Route::resource('dashboard-admin', DashboardAdminController::class);
    Route::resource('objek-wisata', ObjekWisataController::class);
    Route::post('/objek-wisata/EditForm', [ObjekWisataController::class, 'EditForm'])->name('objek-wisata.EditForm');
    
    Route::resource('destinasi', DestinasiController::class);
    Route::post('/destinasi/EditForm', [DestinasiController::class, 'EditForm'])->name('destinasi.EditForm');

    Route::resource('lama-hari', LamaHariController::class);
    Route::post('/lama-hari/EditForm', [LamaHariController::class, 'EditForm'])->name('lama-hari.EditForm');

    Route::resource('include-item', IncludeItemController::class);
    Route::post('/include-item/EditForm', [IncludeItemController::class, 'EditForm'])->name('include-item.EditForm');
    
    Route::resource('what-bring', WhatBringController::class);
    Route::post('/what-bring/EditForm', [WhatBringController::class, 'EditForm'])->name('what-bring.EditForm');

    Route::resource('general-term', GeneralTermController::class);
    Route::post('/general-term/EditForm', [GeneralTermController::class, 'EditForm'])->name('general-term.EditForm');
    

    Route::resource('daftar-paket', DaftarPaketController::class);
    Route::post('/daftar-paket/store', [DaftarPaketController::class, 'store'])->name('daftar-paket.store');
    Route::get('/daftar-paket/edit/{id}', [DaftarPaketController::class, 'edit'])->name('daftar-paket.edit');
    Route::post('/daftar-paket/update', [DaftarPaketController::class, 'update'])->name('daftar-paket.update');
    Route::get('/daftar-paket/detail/{id}', [DaftarPaketController::class, 'show'])->name('daftar-paket.detail');
    
});

// Route::resource('dashboard-user', DashboardUserController::class);

Route::resource('destination', DestinationController::class);
Route::get('/tour/{destinasi_id}', [DestinationController::class, 'getTour'])->name('destination.tour');
Route::get('/selectTour', [DestinationController::class, 'selectTour'])->name('destination.selectTour');
Route::get('/tour/detail/{id}', [DestinationController::class, 'show'])->name('destination.detail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
