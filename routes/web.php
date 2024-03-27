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

Route::get('/detail/{id}', [App\Http\Controllers\ProductesController::class, 'showDetail'])->name('detail');
//Route::get('/detai/{id}/',[App\Http\Controllers\ProductesController::class, 'Detail'])->name('detail');//詳細追加
Route::get('/edit/{id}',[App\Http\Controllers\ProductesController::class, 'showEdit'])->name('edit');
//Route::get('/edit/{id}/', [App\Http\Controllers\ProductesController::class, 'Edit'])->name('edit');//編集追加
Route::post('/update', [App\Http\Controllers\ProductesController::class, 'update'])->name('update');//更新
Route::get('/delete/{id}', [App\Http\Controllers\ProductesController::class, 'delete'])->name('delete');//削除
Route::get('/regist', [App\Http\Controllers\ProductesController::class, 'regist'])->name('regist');//新規登録
Route::get('/search', [App\Http\Controllers\ProductesController::class, 'search'])->name('search');//検索

//Route::get('/regist', [App\Http\Controllers\ProductesController::class, 'showRegistForm'])->name('registSubmit');
//Route::get('/edit/{id}', [App\Http\Controllers\ProductesController::class, 'showEdit'])->name('edit');
//Route::get('/edit/{id}', [App\Http\Controllers\ProductesController::class, 'registEdit'])->name('registEdit');
//Route::get('/productes/{id}', [App\Http\Controllers\ProductesController, 'destroy'])->name('destory');

