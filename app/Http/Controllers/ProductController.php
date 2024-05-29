<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
//use App\Models\Sale;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  //login 
  public function login(){
      $model= new Product();
      $products = $model->getlogin();
      return view('auth.login', ['products' => $products]);
  }
  //register
  public function register(){
      $model= new Product();
      $products = $model->getregister();
      return view('auth.register', ['products' => $products]);
  }
  //リレーション
  public function Relation(){
      $model = new Product();
      $products = $model->showRelation();
      return view('list', ['products' => $products]);
  }
  //一覧画面表示
  public function getList(){
      $product_model= new Product();
      $products = $product_model->showRelation();
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('list',['products' => $products,'companies' => $companies]);
  }
  //検索機能
  public function search(Request $request){
      $company_id = $request->input('company_id');
      $keyword=$request->input('keyword');
      $model = new Product();
      $products=$model->searchProduct($keyword,$company_id);
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('list',['products' => $products,'companies' => $companies]);
  }
  ///更新
  public function update(Request $request,$id){
    DB::beginTransaction();
    try {
    $model = new Product();
    $model->update($request,$id);
    DB::commit();
  } catch (\Exception $e) {
      DB::rollback();
      return back();
  }
    return redirect()->route('list');
}
  //新規登録画面regist
  public function Regist(Request $request){
      $product_model= new Product();
      $products = $product_model->getRegist();
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('regist', ['products' => $products,'companies' => $companies]);
  }
   
    // 登録処理 
    public function submit(Request $request){
      //dd($request);
      $model = new Product();
    DB::beginTransaction();
      try {
          $image = $request->file('image');
        if($image){
          $file_name = $image->getClientOriginalName();
          $image->storeAs('public/images', $file_name);
          $img_path = 'storage/images/' . $file_name;
        }else{
          $img_path=null;
        } 
          $model->submit($request,$img_path);
          DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return back();
        }
          return redirect()->route('list');
  }
    
  //詳細画面表示detail
  public function Detail($id){
      $product_model= new Product();
      $products= $product_model->getDetail($id);
      return view('detail', ['products' => $products]);
  }
  // //詳細検索detail
  // public function searchdetail(){
  //     $product_model= new Product();
  //     $products= $product_model->getDetail();
  //     return view('detail', ['products' => $products]);
  // }
  
   //商品編集
  public function Edit(Request $request,$id){
      $product_model= new Product();
       DB::beginTransaction();
        try {
           $image = $request->file('img');
         if($image){
           $file_name = $image->getClientOriginalName();
           $image->storeAs('public/images', $file_name);
           $img_path = 'storage/images/' . $file_name;
         }else{
           $img_path=null;
         } 

      $products = $product_model->getEdit($request,$id);
      $model->edit($request,$img_path);
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
        $model = new Product();
        $model->delete($id);
        DB::commit();
      }catch (Exception $e) {
        DB::rollback();
        
      }
      return redirect()->route('list');
      
  }  
}
   