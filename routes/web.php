<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KegPKLController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login ');
})->name('login');


Route::resource('jurusan', JurusanController::class)->middleware('auth');
Route::resource('perusahaan', PerusahaanController::class)->middleware('auth');
Route::resource('kelas', KelasController::class)->middleware('auth');
Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('pkl', KegPKLController::class)->middleware('auth');


//Route Import data using excel
Route::post('/siswa/import_excel', 'App\Http\Controllers\SiswaController@import_excel');


