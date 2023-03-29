<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PulangController;
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
//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

// File Routing

Route::get('/file/lupus',[FileController::class,'showlupus']);

Route::get('/file',[FileController::class,'index']);
Route::get('/file/create',[FileController::class,'create']);
Route::get('/file/store',[FileController::class,'store']);
Route::get('/file/show/{id}',[FileController::class,'show']);
Route::get('/file/update/{id}',[FileController::class,'update']);
Route::get('/file/destroy/{id}',[FileController::class,'destroy']);
Route::get('/file/lupus/{id}',[FileController::class,'lupus']);

// User view pinjaman & pulang
Route::get('/pinjaman',[PeminjamanController::class,'index']);
Route::get('/pinjam/{id}',[PeminjamanController::class,'store']);

Route::get('/pemulangan',[PulangController::class,'index']);
Route::get('/pemulangan/{id}',[PulangController::class,'pemulangan']);


// Admin view pinjaman
Route::get('/file/pinjaman',[PeminjamanController::class,'pinjaman']);
Route::get('/file/rekodpinjaman',[PeminjamanController::class,'rekodpinjaman']);
Route::get('/file/accept/{id}',[PeminjamanController::class,'accept']);
Route::get('/file/decline/{id}',[PeminjamanController::class,'decline']);











require __DIR__.'/auth.php';
