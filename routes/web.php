<?php

use App\Http\Controllers\formController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\role_userController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/form', [formController::class, 'index'])->name('form.index');
Route::post('/form/store', [formController::class, 'store'])->name('form.store');

Route::get('/role', [role_userController::class, 'index'])->name('role.index');
Route::get('/role/user/{id}', [role_userController::class, 'create'])->name('role.create');
Route::post('/role/user}', [role_userController::class, 'store'])->name('role.store');
