<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingcarController;
use App\Http\Controllers\SignupController;
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

Route::get( '/' , [HomeController::class, 'show'])->name('home');


// Route::get('/home', [HomeController::class, 'joinproduct']);
// Route::resource('/perfil',ProfileController::class);
Route::get('/perfil/{name?}', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('perfil/update', [ProfileController::class, 'update'])->name('profile/update');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('/login');
Route::post('/login', [LoginController::class, 'login'])->name('authentication');

Route::get('/registro', [SignupController::class, 'index']);
Route::post('/registro', [SignupController::class, 'store'])->name('save');
Route::get('/registro/{type}/{data}', [SignupController::class, 'check']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/reset-password', [LoginController::class, 'index']);

Route::get('/categorias',[ProductController::class, 'categories'])->name('/categorias');
Route::get('/categoria/{category}',[ProductController::class, 'byCategory'])->name('/categorias/{category}');

Route::get('/categoria/{categoria}/{producto}/{color?}', [DetailProductController::class, 'show']);

// Route::get('/contactanos', ContactUsController::class);
Route::get('/contactanos', [ContactUsController::class, 'index']);

Route::get('/carrito/nuevo', [ShoppingcarController::class, 'newbill'])->middleware('auth');
Route::get('/carrito', [ShoppingcarController::class, 'index'])->middleware('auth');
Route::post('/carrito/agregar', [ShoppingcarController::class, 'store'])->middleware('auth');
Route::post('/carrito/Pago', [ShoppingcarController::class, 'order'])->middleware('auth');
Route::get('/carrito/remover/{id}', [ShoppingcarController::class, 'destroy'])->middleware('auth');
Route::post('/carrito/actualizar/{id}', [ShoppingcarController::class, 'update'])->middleware('auth');
Route::get('/carrito/actualizar/{id}/{cant}', [ShoppingcarController::class, 'updateSubtotal'])->middleware('auth');



Route::get('/productos/search/{text}', [ProductController::class, 'search']);



Route::post('/cambiar-contrasena', [ProfileController::class, 'forgotPassword'])->name('password.email');



Route::get('/reset-contrasena/{token}', function ($token) {
    return view('user.password.index', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [ProfileController::class, 'resetPassword'])->name('password.update');
