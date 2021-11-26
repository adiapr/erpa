<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsosiasiController;
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

Route::get('admin',function(){
    return view('administrator.datatables');
})->middleware('checkRole:adminstrator');

Route::get('penjual',function(){
    return view('penjual');
})->middleware('checkRole:adminstrator,asosiasi');


Route::get('/user',             [UserController::class, 'index'])       ->middleware('checkRole:adminstrator');
Route::get('/user/profile',     [UserController::class, 'profile'])      ->middleware('checkRole:adminstrator');
Route::post('user/add',         [UserController::class, 'add'])         ->middleware('checkRole:adminstrator')->name('user.add');
Route::post('user/delete/{id}', [UserController::class, 'delete'])     ->middleware('checkRole:adminstrator')->name('user.delete');
Route::post('user/update/{id}', [UserController::class, 'update'])      ->middleware('checkRole:adminstrator')->name('user.update');

Route::get('/asosiasi',         [AsosiasiController::class, 'index'])   ->middleware('checkRole:adminstrator');
Route::get('/asosiasi/tambahpermohonan',        [AsosiasiController::class, 'tambahpermohonan'])->middleware('checkRole:adminstrator');
Route::get('/asosiasi/tambahpendaftaran',       [AsosiasiController::class, 'tambahpendaftaran'])->middleware('checkRole:adminstrator');
Route::get('/asosiasi/organisasi',              [AsosiasiController::class, 'view_organisasi'])->middleware('checkRole:adminstrator');
Route::post('/asosiasi/organiasai/add',          [AsosiasiController::class, 'add_organisasi'])->middleware('checkRole:adminstrator')->name('organisasi.add');
Route::post('/asosiasi/organisasi/delete/{id}', [AsosiasiController::class, 'delete_organisasi'])->middleware('checkRole:adminstrator')->name('asosiasi.organisasi.delete');
Route::post('/asosiasi/organisasi/update/{id}', [AsosiasiController::class, 'update_organisasi'])->middleware('checkRole:adminstrator')->name('asosiasi.organisasi.update');
Route::post('/asosiasi/organisasi/autocomplete', [AsosiasiController::class, 'dataorganisasi'])->name('asosiasi.organisasi.autocomplete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
