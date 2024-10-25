<?php

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

Route::get('/', function () {
    return view('inicio');
});

Route::get('/singin', function () {
    return view('login');
});

Route::get('/singup', function () {
    return view('loginout');
});

Route::get('/principal', function () {
    return view('index');
});
/* Route::get('/login', [LoginController::class, 'index']);
 */