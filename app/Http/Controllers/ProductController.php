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
  public function list(){
      $product_model= new Product();
      $products = $product_model->showRelation();
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('list',['products' => $products,'companies' => $companies]);
  }
  //検索機能
  public function search(Request $id){
      $company_id = $request->input('company_id');
      $keyword=$request->input('keyword');
      $model = new Product();
      $products=$model->getsearch($keyword,$company_id);
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('list',['products' => $products,'companies' => $companies]);
  }
  //詳細画面表示detail
  public function detail($id){
    $product_model= new Product();
    $products= $product_model->getdetail($id);
    return view('detail', ['products' => $products]);
  }
  //編集画面表示edit
  public function edit($id){
    $product_model= new Product();
    $products= $product_model->getedit($id);
    $company_model= new Company();
    $companies = $company_model->getAll();
    return view('edit', ['products' => $products,'companies' => $companies]);
  }
  //編集登録処理display
  public function display(Request $request,$img_path){
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
         $model->display($request,$img_path);
      DB::commit();
      } catch (\Exception $e) {
           DB::rollback();
           return back();
      }
        return redirect()->route('edit');
  }
  

  ///更新
  public function update($id){
      DB::beginTransaction();
      try {
        $model = new Product();
        $model->updateSubmit($id);
        DB::commit();
      } catch (\Exception $e) {
        DB::rollback();
        return back();
      }
      $product->save();
      return redirect()->route('edit');
    }
  //新規登録画面regist
  public function regist(Request $request){
      $company_model= new Company();
      $companies = $company_model->getregist($request);
      return view('regist', ['companies' => $companies]);
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
          $model->submit($request);
          DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return back();
        }
          return redirect()->route('list');
  }
  //削除
  public function delete($id)
  {
      DB::beginTransaction();
      try {
        $model = new Product();
        $model->deleteSubmit($id);
        DB::commit();
      }catch (Exception $e) {
        DB::rollback();
      }
      return redirect()->route('list');
  }  
}
   