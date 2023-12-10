<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

/* Catgory Routes */

Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::post('/store',[CategoryController::class,'store'])->name('store');
Route::get('/categoryview',[CategoryController::class,'categoryview'])->name('categoryview');
Route::get('/categorydestroy/{id}',[CategoryController::class,'categorydestroy'])->name('categorydestroy');
Route::get('/categoryedit/{id}',[CategoryController::class,'categoryedit'])->name('categoryedit');
Route::put('/categoryupdate',[CategoryController::class,'categoryupdate'])->name('categoryupdate');

/* Task Routes */
Route::get('/create',[TaskController::class,'create'])->name('create');
Route::post('/taskadd',[TaskController::class,'taskadd'])->name('taskadd');
Route::get('/edit/{id}',[TaskController::class,'edit'])->name('edit');
Route::put('/update',[TaskController::class,'update'])->name('update');
Route::get('/view/{id}',[TaskController::class,'view'])->name('view');
Route::delete('/destroy',[TaskController::class,'destroy'])->name('destroy');
Route::get('/mytask',[TaskController::class,'mytask'])->name('mytask');

/* Authentication Routes */

Route::get('/home',[AuthController::class,'home'])->name('home');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/index',[AuthController::class,'index'])->name('index');
Route::get('/registration',[AuthController::class,'registration'])->name('registration');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/loginpost',[AuthController::class,'loginpost'])->name('loginpost');
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');




