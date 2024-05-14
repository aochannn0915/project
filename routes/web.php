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
Route::get('/regist', [App\Http\Controllers\ProductesController::class, 'regist'])->name('regist');//新規登録
Route::get('/form', [App\Http\Controllers\ProductesController::class, 'form'])->name('form');
Route::post('/submit', [App\Http\Controllers\ProductesController::class, 'submit'])->name('submit');//新規登録処理
Route::get('/detail/{id}', [App\Http\Controllers\ProductesController::class, 'showDetail'])->name('detail');
Route::get('/edit/{id}',[App\Http\Controllers\ProductesController::class, 'showEdit'])->name('edit');
Route::post('/update', [App\Http\Controllers\ProductesController::class, 'update'])->name('update');//更新//
Route::get('/delete/{id}', [App\Http\Controllers\ProductesController::class, 'delete'])->name('delete');//削除
Route::get('/search', [App\Http\Controllers\ProductesController::class, 'search'])->name('search');//検索
Route::get('/login', [App\Http\Controllers\ProductesController::class, 'login'])->name('login1');//login
Route::post('/login', [App\Http\Controllers\ProductesController::class, 'login'])->name('login');//login処理
Route::get('/register',[App\Http\Controllers\ProductesController::class, 'register'])->name('registers');
Route::post('/register',[App\Http\Controllers\ProductesController::class, 'register'])->name('register');


