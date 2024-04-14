<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductesController;


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
   return view('app');
});
Route::get('/list', [App\Http\Controllers\ProductesController::class, 'showList'])->name('list');//商品一覧画面
Route::get('/regist', [App\Http\Controllers\ProductesController::class, 'showRegistform'])->name('regist');
Route::post('/regist', [App\Http\Controllers\ProductesController::class, 'registsubmit'])->name('regist');
Route::get('/detail/{id}', [App\Http\Controllers\ProductesController::class, 'showDetail'])->name('detail');
Route::get('/edit/{id}',[App\Http\Controllers\ProductesController::class, 'showEdit'])->name('edit');
Route::post('/update', [App\Http\Controllers\ProductesController::class, 'update'])->name('update');//更新//
Route::get('/delete/{id}', [App\Http\Controllers\ProductesController::class, 'delete'])->name('delete');//削除
Route::get('/regist', [App\Http\Controllers\ProductesController::class, 'regist'])->name('regist');//新規登録
Route::get('/search', [App\Http\Controllers\ProductesController::class, 'search'])->name('search');//検索
Route::get('/login', [App\Http\Controllers\ProductesController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\ProductesController::class, 'login'])->name('login');
Route::get('/register',[App\Http\Controllers\ProductesController::class, 'register'])->name('register');
Route::post('/register',[App\Http\Controllers\ProductesController::class, 'register'])->name('register');
//Route::get('/regist/add', 'ProductesController@add')->name('productes_add');
//Route::post('/regist/add', 'ProductesController@create')->name('productes_create');



