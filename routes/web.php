<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('frontend.index');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Auth::routes();
Route::prefix('manage')->middleware('checkrole')->group(function () {

        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('manage.index');
        Route::get('/mylogout', [App\Http\Controllers\AdminController::class, 'mylogout'])->name('mylogout');


        Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
        Route::post('/user/create', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/rehber', [App\Http\Controllers\RehberController::class, 'index'])->name('rehber.index');
        Route::get('/rehber/create', [App\Http\Controllers\RehberController::class, 'create'])->name('rehber.create');
        Route::post('/rehber/create', [App\Http\Controllers\RehberController::class, 'store'])->name('rehber.store');
        Route::get('/rehber/edit/{id}', [App\Http\Controllers\RehberController::class, 'edit'])->name('rehber.edit');
        Route::post('/rehber/edit/{id}', [App\Http\Controllers\RehberController::class, 'update'])->name('rehber.update');
        Route::get('/rehber/delete/{id}', [App\Http\Controllers\RehberController::class, 'destroy'])->name('rehber.destroy');







});
