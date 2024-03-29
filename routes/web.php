<?php

use App\Models\Item;
use App\Models\Guest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkOrderController;

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

    $jumlahtamu = Guest::count();
    $jumlahbarang = Item::count();
    // $jumlahtamuperempuan = Guest::where('jenis_kel','perempuan')->count();

    return view('welcome', compact('jumlahtamu','jumlahbarang'));
})->middleware('auth');

Route::get('/tamu', [GuestController::class, 'index'])->name('tamu')->middleware('auth');


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

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('loginuser');

//register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//App barang dan Surat

Route::get('/databarang', [ItemController::class, 'barang'])->name('databarang');
Route::get('/tambahbarang', [ItemController::class, 'tambahbarang'])->name('tambahbarang');
Route::post('/insertbarang', [ItemController::class, 'insertbarang'])->name('insertbarang');


Route::get('/tampilbarang/{id}', [ItemController::class, 'tampilbarang'])->name('tampilbarang');
Route::post('/updatebarang/{id}', [ItemController::class, 'updatebarang'])->name('updatebarang');

Route::get('/deletebarang/{id}', [ItemController::class, 'deletebarang'])->name('deletebarang');

//work order

Route::get('/workorder', [WorkOrderController::class, 'workorder'])->name('workorder');
Route::get('/tambahwo', [WorkOrderController::class, 'tambahwo'])->name('tambahwo');

Route::post('/insertwo', [WorkOrderController::class, 'insertwo'])->name('insertwo');
Route::get('/tampilwo/{id}', [WorkOrderController::class, 'tampilwo'])->name('tampilwo');
Route::post('/updatewo/{id}', [WorkOrderController::class, 'updatewo'])->name('updatewo');
Route::post('/selesaiwo/{id}', [WorkOrderController::class, 'selesaiwo'])->name('selesaiwo');
