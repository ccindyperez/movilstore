<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\shoppingController;
use App\Http\Controllers\UserControllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/register', [UserControllers::class, 'showForm'])->name('register.form');
Route::post('/register', [UserControllers::class, 'crear'])->name('register.create');
Route::get('/login', [UserControllers::class, 'showLoginForm'])->name('loginUser.login'); // Mostrar el formulario de login
Route::post('/login', [UserControllers::class, 'login'])->name('loginUser'); // Procesar login
Route::post('/logout', [UserControllers::class, 'logout'])->name('logout1'); // Cerrar sesión
Route::get('/dashboard', [ProductosController::class, 'show'])->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/loginUser/{id}/edit', [ProfileController::class, 'edit'])->name('loginUser.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Ruta para "Mis Pedidos"
    Route::post('shopping/add', [shoppingController::class, 'add'])->name('add');
    Route::get('shopping/chekout', [shoppingController::class, 'checkout'])->name('checkout');
    Route::get('shopping/clear', [shoppingController::class, 'clear'])->name('clear');
    Route::post('shopping/removeItem', [shoppingController::class, 'removeItem'])->name('removeItem');

    Route::post('shopping/increaseQuantity', [shoppingController::class, 'increaseQuantity'])->name('increaseQuantity');
    Route::post('shopping/decreaseQuantity', [shoppingController::class, 'decreaseQuantity'])->name('decreaseQuantity');
    // web.php
    Route::post('/guardarPedido', [shoppingController::class, 'guardarPedido'])->name('guardarPedido');
    Route::post('/generar-recibo', [shoppingController::class, 'generarRecibo'])->name('generarRecibo');
    Route::get('/search-by-category', [ProductosController::class, 'searchByCategory'])->name('searchByCategory');
    Route::post('/profile/update', [UserControllers::class, 'updateProfile'])->name('updateProfile');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/auth/dashboard', [adminController::class, 'index'])->name('admin.index');

    Route::get('/auth/user', [adminController::class, 'users'])->name('admin.users');
    Route::get('/user/crear', [adminController::class, 'createU'])->name('admin.crear');
    Route::post('/user/crearN', [adminController::class, 'store'])->name('admin.store');
    Route::get('/auth/forms/{id}/edit', [adminController::class, 'edit'])->name('admin.edit');
    Route::put('/auth/forms/{id}/update', [adminController::class, 'update'])->name('admin.update');
    Route::get('/auth/forms/{id}/eliminar', [adminController::class, 'eliminar'])->name('admin.eliminar');
    Route::delete('/auth/forms/{usuario}/delete', [adminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/auth/calendar', [adminController::class, 'verShop'])->middleware('auth.admin')->name('admin.shopping');
    Route::get('/auth/shopping/{id}/eliminar', [adminController::class, 'EliminarShop'])->middleware('auth.admin')->name('admin.shopElim');
    Route::delete('/auth/shopping/{shop}/destroy', [adminController::class, 'destroyShop'])->middleware('auth.admin')->name('admin.shopDes');
    //Crud de productos
    Route::get('/auth/tables', [ProductosController::class, 'index']);
    Route::get('/productos/form', [ProductosController::class, 'create']);
    Route::post('/productos/crear', [ProductosController::class, 'save']);
    Route::get('/auth/admin/admin/{id}/edit', [ProductosController::class, 'edit']);
    Route::put('/auth/admin/admin/{product}/update', [ProductosController::class, 'update']);
    Route::get('/auth/admin/admin/{id}/delete', [ProductosController::class, 'eliminar']);
    Route::delete('/auth/admin/admin/{product}/eliminar', [ProductosController::class, 'destroy']);

});
Route::post('/logout', [UserControllers::class, 'logout'])->name('logout');






Route::get('/', function () {
    return view('/welcome');
});


