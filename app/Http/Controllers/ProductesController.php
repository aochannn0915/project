<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productes;
use App\Models\Companies;
use App\Models\Sales;
use App\Http\Requests\ProductesRequest;
use Illuminate\Support\Facades\DB;

class ProductesController extends Controller
{
  //login 
  public function login(){
    $model= new Productes();
    $productes = $model->login();
    return view('auth.login', ['productes' => $productes]);
  }
  //register
  public function register(){
    $model= new Productes();
    $productes = $model->register();
    return view('auth.register', ['productes' => $productes]);
  }
  //リレーション
  public function showRelation(){
    $model = new Productes();
    $productes = $model->show();
    return view('list', ['productes' => $productes]);
  }
  //一覧画面表示
  public function showList(){
    $product_model= new Productes();
    $productes = $product_model->showRelation();
    $company_model= new Companies();
    $companies = $company_model->getAll();
    return view('list',['productes' => $productes,'companies' => $companies]);
  }
  //検索機能
  public function search(Request $request){
    $company_id = $request->input('company_id');
    $keyword=$request->input('keyword');
    $model = new Productes();
    $company_model= new Companies();
    $companies = $company_model->getAll();
    $productes=$model->searchProductes($keyword,$company_id);
    return view('list',['productes' => $productes,'companies' => $companies]);
  }
  //更新
  public function upDate(Request $request,$id){
    $productes = Productes::find;
    $updateList = $this->productes->updateList($request, $productes);
    return redirect()->route('list');
  }     
  //新規登録画面regist
   public function Regist(){
    $productes_model= new Productes();
    $productes = $productes_model->Regist();
    return view('list', ['productes' => $productes]);
   }
  //新規登録処理
  public function showRegistform(){
    return view('regist');
  }
  public function registsubmit(Request $request){
    DB::beginTransaction();
    try {
    $model = new Productes();
    $model->registProduct($request);
    DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }
    return redirect()->route('regist');
  }
  //詳細画面表示detail
  public function showDetail($id){
    $productes_model= new Productes();
    $productes = $productes_model->getDetail($id);
    return view('detail', ['productes' => $productes]);
  }
  // //検索 詳細
  // public function searchDetail(Request $request){
  //   $img_path = $request->input('img_path');
  //   $product_name = $request->input('product_name');
  //   $company_name= $request->input('company_name');
  //   $price = $request->input('price');
  //   $comment= $request->input('comment');
  //   $productes_model= new productes();
  //   $productes_$model->searchDetail($img_path,$product_name,$company_name, $price,$comment);
  //   return view('detail',['productes' => $productes,]);
  // }
  
   //商品編集
  public function showEdit($id){
    $productes_model= new Productes();
    $productes = $productes_model->getEdit($id);
      return view('edit', ['productes' => $productes]);
  }
   ///更新
  public function updateProductes(Request $request, $id){
    DB::beginTransaction();
    try {
    $model = new Productes();
    $model->updateProductes($request, $id);
    DB::commit();
  } catch (\Exception $e) {
      DB::rollback();
      //return back();
  }
    return redirect()->route('edit');
 }
  //削除
 
  public function delete($id){
    DB::beginTransaction();
    try {
      $model = new Productes();
      $model->deleteProductes($id);
      DB::commit();
    }catch (Exception $e) {
      DB::rollback();
      
    }
    return redirect()->route('list');
    
  }  
    public function Image(Request $request) {
      $image = $request->file('image');
      $file_name = $image->getClientOriginalName();
      $image->storeAs('public/images', $file_name);
      $image_path = 'storage/images/' . $file_name;
      $model = new Productes();
            DB::beginTrasnsaction();
      try{
        $model->registProductes($image_path);
        DB::commit();
      }catch(Exception $e){
        DB::rollBack();
      }
    }
}
   