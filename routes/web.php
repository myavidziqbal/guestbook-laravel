<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

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

Route::get('/tamu', [GuestController::class, 'index'])->name('tamu');

//tambah tamu
Route::get('/tambahtamu', [GuestController::class, 'tambahtamu'])->name('tambahtamu');

//insert data
Route::post('/insertdata', [GuestController::class, 'insertdata'])->name('insertdata');

//tampil data
Route::get('/tampildata/{id}', [GuestController::class, 'tampildata'])->name('tampildata');

//update
Route::post('/updatedata/{id}', [GuestController::class, 'updatedata'])->name('updatedata');

//delete
Route::post('/updatedata/{id}', [GuestController::class, 'updatedata'])->name('updatedata');

//delete
Route::get('/delete/{id}', [GuestController::class, 'delete'])->name('delete');

//Export PDF
Route::get('/exportpdf', [GuestController::class, 'exportpdf'])->name('exportpdf');
//Export Excel
Route::get('/exportexcel', [GuestController::class, 'exportexcel'])->name('exportexcel');


Route::post('/importexcel', [GuestController::class, 'importexcel'])->name('importexcel');
