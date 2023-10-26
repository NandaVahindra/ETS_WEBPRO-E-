<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataClassController;
use App\Http\Controllers\DataMahasiswa;
use App\Http\Controllers\UproleController;
use App\Http\Controllers\UserControlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function (){
    Route::view('/', 'halaman_depan/index');
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class,'verify']);
});

Route::middleware(['auth'])->group(function (){
    Route::redirect('/home','/user');
    Route::get('/admin', [AdminController::class,'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/user', [UserController::class,'index'])->name('user')->middleware('userAkses:user');

    Route::get('/datamahasiswa',[DataMahasiswa::class,'index'])->name('datamahasiswa')->middleware('userAkses:admin');
    
    Route::get('/damatambah', [DataMahasiswa::class, 'tambah'])->name('damatambah')->middleware('userAkses:admin');
    Route::get('/damaedit/{id}', [DataMahasiswa::class, 'edit'])->name('damaedit')->middleware('userAkses:admin');
    Route::post('/editdama', [DataMahasiswa::class, 'change'])->middleware('userAkses:admin');
    Route::post('/tambahdama', [DataMahasiswa::class, 'create'])->middleware('userAkses:admin');
    Route::post('/damahapus/{id}', [DataMahasiswa::class, 'hapus']);


    Route::get('/manageuser', [UserControlController::class,'index'])->name('usercontrol')->middleware('userAkses:admin');
    Route::get('/tambahuc', [UserControlController::class, 'tambah']);
    Route::get('/edituc/{id}', [UserControlController::class, 'edit']);
    Route::post('/hapusuc/{id}', [UserControlController::class, 'hapus']);
    Route::post('/tambahuc', [UserControlController::class, 'create']);
    Route::post('/edituc', [UserControlController::class, 'change']);

    Route::post('/uprole/{id}', [UproleController::class, 'index']);

    Route::get('/manageclass', [DataClassController::class,'index'])->name('manageclass')->middleware('userAkses:admin');
    Route::get('/classtambah', [DataClassController::class, 'tambah'])->name('classtambah')->middleware('userAkses:admin');
    Route::post('/tambahclass', [DataClassController::class, 'create']);
    Route::post('/hapusclass/{id}', [DataClassController::class, 'hapus']);
    Route::get('/editclass/{id}', [DataClassController::class, 'edit']);
    Route::get('/addmhs/{id}', [DataClassController::class, 'add']);
    Route::post('/classedit', [DataClassController::class, 'change']);
    Route::post('/classaddmhs', [DataClassController::class,'tambahmhs']);
    Route::get('/viewclass/{id}', [DataClassController::class, 'view']);
    Route::get('/viewkelas', [UserController::class, 'view'])->name('viewkelas');
    Route::get('/viewclassuser/{id}', [UserController::class, 'class']);
    
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});