<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\BlogController;
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
    return view('login');
})->name('login');

Route::get('/dashboard',[MahasiswaController::class, 'home'])->name('dashboard');

Route::get('/inputform',[MahasiswaController::class, 'inputform'])->name('form');
Route::get('/datamahasiswa',[MahasiswaController::class, 'read'])->name('getdata');
Route::post('/add-mahasiswa',[MahasiswaController::class, 'create'])->name('create');
Route::get('/update-mahasiswa/{nim}',[MahasiswaController::class, 'inputform'])->name('form');
Route::post('/edit-mhs/{nim}',[MahasiswaController::class, 'update'])->name('update');
Route::get('/delete-mahasiswa/{nim}',[MahasiswaController::class, 'delete'])->name('delete');

Route::get('/auth/redirect', [LoginController::class, 'redirectGoogle'])->name('google.redirect');
Route::get('/google/callback', [LoginController::class, 'callbackGoogle'])->name('google.callback');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
