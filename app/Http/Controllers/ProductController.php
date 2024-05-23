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
      $product = $model->login();
      return view('auth.login', ['product' => $product]);
  }
  //register
  public function register(){
      $model= new Product();
      $product = $model->register();
      return view('auth.register', ['product' => $product]);
  }
  //リレーション
  public function show(){
      $model = new Product();
      $product = $model->showRelation();
      return view('list', ['product' => $product]);
  }
  //一覧画面表示
  public function showList(){
      $product_model= new Product();
      $product = $product_model->showRelation();
      $company_model= new Company();
      $company = $company_model->getAll();
      return view('list',['product' => $product,'company' => $company]);
  }
  //検索機能
  public function search(Request $request){
      $company_id = $request->input('company_id');
      $keyword=$request->input('keyword');
      $model = new Product();
      $company_model= new Company();
      $company = $company_model->getAll();
      $product=$model->searchProduct($keyword,$company_id);
      return view('list',['product' => $product,'company' => $company]);
  }
  //更新
  public function update(Request $request,$id){
      $product = new Product($id);
      $product->updateproduct($request, $id);
      return redirect()->route('list');
  }     
  //新規登録画面regist
  public function Regist(Request $request){
      $product_model= new Product();
      $product = $product_model->getRegist();
      $company_model= new Company();
      $company = $company_model->getAll();
      return view('regist', ['product' => $product,'company' => $company]);
  }
   
    // 登録処理 
    public function submit(Request $request){
      //dd($request);
      $model = new Product();
    DB::beginTransaction();
      try {
          $image = $request->file('img_path');
        if($image){
          $file_name = $image->getClientOriginalName();
          $image->storeAs('public/images', $file_name);
          $img_path = 'storage/images/' . $file_name;
        }else{
          $img_path=null;
        } 
          $product_model = new Product();
          $product_model->registProduct($request);
          $model->registProduct($img_path);
          DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return back();
        }
          return redirect()->route('list');
  }
    
  //詳細画面表示detail
  public function showDetail($id){
      $product_model= new Product();
      $product= $product_model->getDetail($id);
      return view('detail', ['product' => $product]);
  }
  //詳細検索detail
  public function searchdetail(){
      $product_model= new Product();
      $product= $product_model->getDetail();
      return view('detail', ['product' => $product]);
  }
  
   //商品編集
  public function showEdit(Request $request,$id){
    // DB::beginTransaction();
    // try {
    //     $image = $request->file('img_path');
    //   if($image){
    //     $file_name = $image->getClientOriginalName();
    //     $image->storeAs('public/images', $file_name);
    //     $img_path = 'storage/images/' . $file_name;
    //   }else{
    //     $img_path=null;
    //   } 
      $product_model= new Product();
      $product = $product_model->getEdit($request,$id);
    //   $model->editProductes($img_path);
      $company_model= new Company();
      $company = $company_model->getAll($id);
    //   DB::commit();
    // } catch (\Exception $e) {
    //     DB::rollback();
    //     return back();
    // }
      return view('edit', ['product' => $product,'company' => $company]);
   }
 
   ///更新
  public function updateProduct(Request $request,$id){
      DB::beginTransaction($id);
      try {
      $model = new Product($id);
      $model->updateProduct($request,$id);
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
        $model->deleteProduct($id);
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
   