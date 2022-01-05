<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsosiasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\VerifikatorController;
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



Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

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

Route::post('/document/serdkpa/{id}',    [DokumenController::class, 'upload_serdkpa']);
Route::get('/delete/serdkpa/{id}',      [DokumenController::class, 'delete_serdkpa']);
Route::get('/download/serdkpa/{id}',    [DokumenController::class, 'download_serdkpa']);

Route::post('/document/serupa/{id}',    [DokumenController::class, 'upload_serupa']);
Route::get('/delete/serupa/{id}',      [DokumenController::class, 'delete_serupa']);
Route::get('/download/serupa/{id}',    [DokumenController::class, 'download_serupa']);

Route::post('/document/sk_pengangkatan/{id}',    [DokumenController::class, 'upload_sk_pengangkatan']);
Route::get('/delete/sk_pengangkatan/{id}',      [DokumenController::class, 'delete_sk_pengangkatan']);
Route::get('/download/sk_pengangkatan/{id}',    [DokumenController::class, 'download_sk_pengangkatan']);

Route::post('/document/sk_menkumham/{id}',    [DokumenController::class, 'upload_sk_menkumham']);
Route::get('/delete/sk_menkumham/{id}',      [DokumenController::class, 'delete_sk_menkumham']);
Route::get('/download/sk_menkumham/{id}',    [DokumenController::class, 'download_sk_menkumham']);

Route::post('/document/pas_foto/{id}',    [DokumenController::class, 'upload_pas_foto']);
Route::get('/delete/pas_foto/{id}',      [DokumenController::class, 'delete_pas_foto']);
Route::get('/download/pas_foto/{id}',    [DokumenController::class, 'download_pas_foto']);

Route::post('/document/bas_advokat/{id}',    [DokumenController::class, 'upload_bas_advokat']);
Route::get('/delete/bas_advokat/{id}',      [DokumenController::class, 'delete_bas_advokat']);
Route::get('/download/bas_advokat/{id}',    [DokumenController::class, 'download_bas_advokat']);

Route::post('/document/sk_magang/{id}',    [DokumenController::class, 'upload_sk_magang']);
Route::get('/delete/sk_magang/{id}',      [DokumenController::class, 'delete_sk_magang']);
Route::get('/download/sk_magang/{id}',    [DokumenController::class, 'download_sk_magang']);

Route::post('/document/surat_berderikasi/{id}',    [DokumenController::class, 'upload_surat_berderikasi']);
Route::get('/delete/surat_berderikasi/{id}',      [DokumenController::class, 'delete_surat_berderikasi']);
Route::get('/download/surat_berderikasi/{id}',    [DokumenController::class, 'download_surat_berderikasi']);

Route::post('/document/sk_pidana/{id}',    [DokumenController::class, 'upload_sk_pidana']);
Route::get('/delete/sk_pidana/{id}',      [DokumenController::class, 'delete_sk_pidana']);
Route::get('/download/sk_pidana/{id}',    [DokumenController::class, 'download_sk_pidana']);

Route::post('/document/sp_bknpns/{id}',    [DokumenController::class, 'upload_sp_bknpns']);
Route::get('/delete/sp_bknpns/{id}',      [DokumenController::class, 'delete_sp_bknpns']);
Route::get('/download/sp_bknpns/{id}',    [DokumenController::class, 'download_sp_bknpns']);

Route::post('/document/status/{id}',    [DokumenController::class, 'upload_status']);
Route::get('/delete/status/{id}',      [DokumenController::class, 'delete_status']);
Route::get('/download/status/{id}',    [DokumenController::class, 'download_status']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkRole:administrator');

// Verifikasi
Route::get('/verifikasi',               [VerifikatorController::class, 'verifikasi_index']);
Route::get('/verifikasi/diterima/{id}', [VerifikatorController::class, 'verifikasi_diterima']);
Route::post('verifikasi/ditolak/{id}',  [VerifikatorController::class, 'verifikasi_ditolak']);