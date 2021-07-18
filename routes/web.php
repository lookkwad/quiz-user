<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index']);
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add'])->name('add');
Route::post('/user/addUser', [UserController::class, 'addUser'])->name('addUser');
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/editUser/{id}', [UserController::class, 'editUser']);
Route::post('/user/delete', [UserController::class, 'delete']);