<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::post('user/add',         [UserController::class, 'add'])         ->middleware('checkRole:adminstrator')->name('user.add');
Route::post('user/delete/{id}', [UserController::class, 'delete'])     ->middleware('checkRole:adminstrator')->name('user.delete');
Route::post('user/update/{id}', [UserController::class, 'update'])      ->middleware('checkRole:adminstrator')->name('user.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
