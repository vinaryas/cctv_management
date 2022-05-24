<?php

use App\Http\Controllers\approvalController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\dep_headController;
use App\Http\Controllers\formController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\itController;
use App\Http\Controllers\role_userController;
use App\Http\Controllers\videoController;
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
Route::get('/form/detail/{id}', [formController::class, 'detail'])->name('form.detail');
Route::get('/form/create/{id}', [formController::class, 'create'])->name('form.create');
Route::post('/form/store', [formController::class, 'store'])->name('form.store');

Route::group(['middleware' => 'permission:approve'], function (){
    Route::get('/approval', [approvalController::class, 'index'])->name('approval.index');
    Route::get('/approval/create/{id}', [approvalController::class, 'create'])->name('approval.create');
    Route::post('/approval/store', [approvalController::class, 'store'])->name('approval.store');
});

Route::group(['middleware' => 'permission:cctv-management'], function (){
    Route::get('/it', [itController::class, 'index'])->name('it.index');
    Route::get('/it/create/{id}', [itController::class, 'create'])->name('it.create');
    Route::post('/it/store', [itController::class, 'store'])->name('it.store');
});

Route::group(['middleware' => 'permission:cctv-management'], function (){
    Route::get('/role', [role_userController::class, 'index'])->name('role.index');
    Route::get('/role/user/{id}', [role_userController::class, 'create'])->name('role.create');
    Route::post('/role/user', [role_userController::class, 'store'])->name('role.store');
});

Route::get('/dep_head', [dep_headController::class, 'index'])->name('dep_head.index');
Route::get('/dep_head/{id}', [dep_headController::class, 'create'])->name('dep_head.create');
Route::post('/dep_head/store', [dep_headController::class, 'store'])->name('dep_head.store');

Route::get('/history', [historyController::class, 'index'])->name('history.index');
Route::get('/video/{uuid}/download', [historyController::class, 'download'])->name('video.download');

Route::get('books/index', [bookController::class, 'index'])->name('books.index');
Route::get('books/create', [bookController::class, 'create'])->name('books.create');
Route::post('books/store', [bookController::class, 'store'])->name('books.store');
Route::get('books/{uuid}/download', [bookController::class, 'download'])->name('books.download');
