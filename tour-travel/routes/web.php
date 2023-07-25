<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DestinasiController;

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

Route::resource('dashboard-admin', DashboardAdminController::class);
Route::resource('destinasi', DestinasiController::class);
Route::post('/destinasi/EditForm', [DestinasiController::class, 'EditForm'])->name('destinasi.EditForm');
// route::get('/dashboard-admin', [DashboardAdminController::class, 'index']);
