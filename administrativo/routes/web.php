<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClasificationController;
use App\Http\Controllers\SalesController;


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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


// Route::resources('/ventas'['id'  => SalesController::class, 'bill_id'   => SalesController::class]);
Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// Route::get('/ventas', [SalesController::class, 'referencia'])->middleware('auth');
// Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('ventas', function () {
		return view('pages.ventas');
})->name('ventas');
	Route::get('ventas', [SalesController::class, 'index'])->name('ventas');
	// Route::get('tables', function () {
	// 	return view('pages.tables');
	// })->name('tables');


	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');

	// Route::get('user-profile', function () {
	// 	return view('pages.laravel-examples.user-profile');
	// })->name('user-profile');
	Route::get('usuarios', [usersController::class,'index'])->name('usuarios');
	Route::get('miperfil', [usersController::class,'show'])->name('miperfil');
	Route::get('editar-aboutus', [usersController::class,'edit'])->name('editar-aboutus');
	Route::post('editar-aboutus/{id}/{idtext}', [usersController::class,'update'])->name('editar-aboutus/{id}/{idtext}');
	Route::get('restringir-usuarios/{id}', [usersController::class,'restrictUser'])->name('restringir-usuarios');
	Route::get('usuarios-restringidos', [usersController::class,'showrestrictUser'])->name('usuarios-restringidos');
	Route::get('quitar-restriccion/{id}', [usersController::class,'quitarRestriccion'])->name('quitar-restriccion');






	Route::get('marcar-entregado/{id}', [SalesController::class,'delivered'])->name('marcar-entregado/{id}');
	Route::get('venta/detalles/{id}', [SalesController::class,'show'])->name('venta/detalles/{id}');
	Route::get('historial', [SalesController::class,'sales'])->name('historial');
	Route::get('productos', [productController::class,'index'])->name('productos');
	Route::get('clasificaciones', [ClasificationController::class,'index'])->name('clasificaciones');
	Route::get('clasificacion/{name}', [ClasificationController::class,'show'])->name('clasificacion/{name}');
	Route::post('crear-clasificacion', [ClasificationController::class,'store'])->name('crear-clasificacion');
	Route::post('editar-clasificacion/{class}/{id}', [ClasificationController::class,'update'])->name('editar-clasificacion/{id}');
	Route::get('papelera-productos', [productController::class,'dumped'])->name('papelera-productos');
	Route::get('editar-producto/{id}', [productController::class,'edit'])->name('editar-producto/{id}');
	Route::post('editar-producto/{id}', [productController::class,'update'])->name('editar-producto/{id}');
	Route::get('eliminar-producto/{id}', [productController::class,'hide'])->name('eliminar-producto/{id}');
	// Route::get('eliminar-producto/definitivo/{id}', [productController::class,'destroy'])->name('eliminar-producto/definitivo/{id}');
	Route::get('nuevo-producto', [productController::class,'create'])->name('nuevo-producto');
	Route::post('nuevo-producto', [productController::class,'store'])->name('nuevo-producto');
	// Route::get('ventas', [SalesController::class,'ref']);

});
