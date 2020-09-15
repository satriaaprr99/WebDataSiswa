<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index']);
Route::post('/admin/tambah',[App\Http\Controllers\AdminController::class, 'tambah']);
Route::get('/admin/{id}/edit',[App\Http\Controllers\AdminController::class, 'edit']);
Route::post('/admin/{id}/edit',[App\Http\Controllers\AdminController::class, 'update']);
Route::get('/admin/{id}/hapus',[App\Http\Controllers\AdminController::class, 'hapus']);