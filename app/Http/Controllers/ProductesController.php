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
  public function update(Request $request,$id){
      $productes = new Productes($id);
      $productes->updateproductes($request, $id);
      return ('list');
  }     
  //新規登録画面regist
  public function Regist(Request $request){
      $productes_model= new Productes();
      $productes = $productes_model->getRegist();
      $company_model= new Companies();
      $companies = $company_model->getAll();
      return view('regist', ['productes' => $productes,'companies' => $companies]);
   }
   
    // 登録処理 
    public function submit(Request $request){
      dd($request);
      $model = new Productes();
    DB::beginTransaction();
      try {
          $image = $request->file('img_path');
        if($image){
          $file_name = $image->getClientOriginalName();
          $image->storeAs('public/images', $file_name);
          $image_path = 'storage/images/' . $file_name;
        }else{
          $img_path=null;
        } 
          $productes_model = new Productes();
          $productes_model->registProductes($request);
          $model->registProductes($image_path);
          DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return back();
        }
          return redirect()->route('list');
     }
    
  //詳細画面表示detail
  public function showDetail($id){
      $productes_model= new Productes();
      $productes = $productes_model->getDetail($id);
      return view('detail', ['productes' => $productes]);
  }
  //詳細検索detail
  public function searchdetail(){
      $productes_model= new Productes();
      $productes = $productes_model->getDetail();
      return view('detail', ['productes' => $productes]);
  }
  
   //商品編集
  public function showEdit(Request $request,$id){
    // DB::beginTransaction();
    // try {
    //     $image = $request->file('img_path');
    //   if($image){
    //     $file_name = $image->getClientOriginalName();
    //     $image->storeAs('public/images', $file_name);
    //     $image_path = 'storage/images/' . $file_name;
    //   }else{
    //     $img_path=null;
    //   } 
      $productes_model= new Productes();
      $productes = $productes_model->getEdit($request,$id);
    //   $model->editProductes($image_path);
      $company_model= new Companies();
      $companies = $company_model->getAll($id);
    //   DB::commit();
    // } catch (\Exception $e) {
    //     DB::rollback();
    //     return back();
    // }
      return view('edit', ['productes' => $productes,'companies' => $companies]);
   }
 
   ///更新
  public function updateProductes(Request $request,$id){
      DB::beginTransaction($id);
      try {
      $model = new Productes($id);
      $model->updateProductes($request,$id);
      DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return back();
    }
      return redirect()->route('list');
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
    // public function Image(Request $request) {
    //   $image = $request->file('image');
    //   $file_name = $image->getClientOriginalName();
    //   $image->storeAs('public/images', $file_name);
    //   $image_path = 'storage/images/' . $file_name;
    //   $model = new Productes();
    //         DB::beginTrasnsaction();
    //   try{
    //     $model->registProductes($image_path);
    //     DB::commit();
    //   }catch(Exception $e){
    //     DB::rollBack();
    //   }
    // }
}
   