<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class, 'show'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('storeCategory');
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('categoryEdit');
Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/loguot', [RegisterController::class, 'logoutFunction'])->name('logout');

Route::get('/login', [RegisterController::class, 'loginindex'])->name('login');
Route::post('/login', [RegisterController::class, 'loginStore'])->name('login');


