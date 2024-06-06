<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
Route::get('/login', [App\Http\Controllers\ProductController::class, 'login'])->name('login1');//login
Route::post('/login', [App\Http\Controllers\ProductController::class, 'login'])->name('login');//login処理
Route::get('/register',[App\Http\Controllers\ProductController::class, 'register'])->name('registers');//ユーザー登録
Route::post('/register',[App\Http\Controllers\ProductController::class, 'register'])->name('register');//ユーザー登録処理
Route::get('/list', [App\Http\Controllers\ProductController::class, 'list'])->name('list');//商品一覧画面
Route::get('/regist', [App\Http\Controllers\ProductController::class, 'regist'])->name('regist');//新規登録
//Route::post('/regist', [App\Http\Controllers\ProductController::class, 'regist'])->name('regist');//新規登録
Route::post('/submit', [App\Http\Controllers\ProductController::class, 'submit'])->name('submit');//新規登録処理
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');//検索
Route::get('/detail/{id}', [App\Http\Controllers\ProductController::class, 'Detail'])->name('detail');
Route::get('/edit',[App\Http\Controllers\ProductController::class, 'Edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');//更新
Route::get('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete');//削除




