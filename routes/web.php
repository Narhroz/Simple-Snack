<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::prefix('admin')->middleware(['auth','Admin'])->group(function(){
    Route::get('/admindex',[AdminController::class, 'index']);
    Route::get('/akun',[AdminController::class, 'akun']);
    Route::get('/add',[AdminController::class, 'create']);
    Route::post('/store',[AdminController::class, 'store']);
    Route::get('/show',[AdminController::class, 'show']);
    Route::get('/edit/{Id}', [AdminController::class, 'edit']);
    Route::post('/update/{Id}', [AdminController::class, 'update']);
    Route::get('/destroy/{Id}', [AdminController::class, 'destroy']);
    Route::get('/hapus/{id}', [AdminController::class, 'hapus']);
});
Route::get('/profile/{id}', [EcomController::class, 'profile']);
Route::post('/update/{id}', [EcomController::class, 'perbarui']);
Route::get('/contact',[EcomController::class, 'contact']);
Route::post('/pesan',[EcomController::class, 'pesan']);
Route::get('/product',[EcomController::class, 'product']);
Route::get('/index',[EcomController::class, 'home']);
Route::get('/cart',[EcomController::class, 'cart']);
Route::post('/addcart/{Id}', [EcomController::class, 'addcart']);
Route::post('/checkout/{id}',[EcomController::class, 'checkout']);
Route::get('/destroy/{id}', [EcomController::class, 'destroy']);
Route::get('/check/{id}', [EcomController::class, 'check']);
Route::post('/new/{id}', [EcomController::class, 'new']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/',[HomeController::class,'index']);

