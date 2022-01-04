<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsosiasiController;
use App\Http\Controllers\DokumenController;
use App\Models\Asosiasi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('admin',function(){
//     return view('administrator.datatables');
// })->middleware('checkRole:adminstrator');

// Route::get('penjual',function(){
//     return view('penjual');
// })->middleware('checkRole:adminstrator,asosiasi');

// Profile
Route::get('/user/profile',     [UserController::class, 'profile'])      ->middleware('checkRole:administrator');
Route::post('/user/profile/update/{id}',    [UserController::class, 'update_profile'])->middleware('checkRole:administrator');

// User
Route::get('/user',             [UserController::class, 'index'])       ->middleware('checkRole:administrator');
Route::post('user/add',         [UserController::class, 'add'])         ->middleware('checkRole:administrator')->name('user.add');
Route::post('user/delete/{id}', [UserController::class, 'delete'])     ->middleware('checkRole:administrator')->name('user.delete');
Route::post('user/update/{id}', [UserController::class, 'update'])      ->middleware('checkRole:administrator')->name('user.update');

Route::get('/asosiasi',         [AsosiasiController::class, 'index'])   ->middleware('checkRole:administrator');

// Permohonan
Route::get('/asosiasi/tambahpermohonan',         [AsosiasiController::class, 'tambahpermohonan'])->middleware('checkRole:administrator');
Route::post('/asosiasi/tambahpermohonan/add',    [AsosiasiController::class, 'permohonan_add'])->middleware('checkRole:administrator')->name('asosiasi.addpermohonan');
Route::post('/asosiasi/tambahpermohonan/update/{id}',   [AsosiasiController::class, 'permohonan_update'])->middleware('checkRole:administrator');
Route::post('/asosiasi/tambahpermohonan/delete/{id}',   [AsosiasiController::class, 'permohonan_delete'])->middleware('checkRole:administrator');

// Pendaftaran
Route::get('/pendaftaran/biodata',      [AsosiasiController::class, 'tambahpendaftaran'])->middleware('checkRole:administrator');
Route::get('/pendaftaran/dokumen',      [AsosiasiController::class, 'dokumen_view'])->middleware('checkRole:administrator');

// organisasi
Route::get('/asosiasi/organisasi',              [AsosiasiController::class, 'view_organisasi'])->middleware('checkRole:administrator');
Route::post('/asosiasi/organiasai/add',          [AsosiasiController::class, 'add_organisasi'])->middleware('checkRole:administrator')->name('organisasi.add');
Route::post('/asosiasi/organisasi/delete/{id}', [AsosiasiController::class, 'delete_organisasi'])->middleware('checkRole:administrator')->name('asosiasi.organisasi.delete');
Route::post('/asosiasi/organisasi/update/{id}', [AsosiasiController::class, 'update_organisasi'])->middleware('checkRole:administrator')->name('asosiasi.organisasi.update');
Route::post('/asosiasi/organisasi/autocomplete', [AsosiasiController::class, 'dataorganisasi'])->name('asosiasi.organisasi.autocomplete');

// upload dokumen 
Route::post('/document/ktp/{id}',    [DokumenController::class, 'upload_ktp']);
Route::get('/delete/ktp/{id}',      [DokumenController::class, 'delete_ktp']);
Route::get('/download/ktp/{id}',    [DokumenController::class, 'download_ktp']);

Route::post('/document/ijazah/{id}',    [DokumenController::class, 'upload_ijazah']);
Route::get('/delete/ijazah/{id}',      [DokumenController::class, 'delete_ijazah']);
Route::get('/download/ijazah/{id}',    [DokumenController::class, 'download_ijazah']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
