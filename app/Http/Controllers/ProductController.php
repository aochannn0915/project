<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\OneRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  //log
  public function login(){
    $model= new Product();
    $products = $model->getlogin();
    return view('auth.login', ['products' => $products]);
}

  //register表示
  public function register(Request $request){
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
  public function list(Request $request){
      $company_id = $request->input('company_id');
      $keyword    = $request->input('keyword');
      $product_model= new Product();
      if ($company_id || $keyword){
      $products = $product_model->getsearch($company_id, $keyword);
    } else {
      $products = $product_model->showRelation();
    }
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('list',['products' => $products,'companies' => $companies]);
}
  
  //詳細画面表示detail
  public function detail($id){
      $model= new Product();
      $products= $model->getdetail($id);
      return view('detail', ['products' => $products]);
}
  //編集画面表示edit
  public function edit($id){
      $product_model= new Product();
      $products= $product_model->getdetail($id);
      $company_model= new Company();
      $companies = $company_model->getAll();
      return view('edit', ['products' => $products,'companies' => $companies]);
}
  //更新処理updateSubmit
  public function updateSubmit(Request $request, $id){
     $model= new Product();
      DB::beginTransaction();
      try {
          $image = $request->file('image');
        if($image){
          $file_name = $image->getClientOriginalName();
          $image->storeAs('public/images', $file_name);
          $img_path = 'storage/images/' . $file_name;
          $products= $model->updateSubmit($request, $id, $img_path);
     }else{
          $model->updateSubmitNoImg($request,$id);
     } 
      DB::commit();
      } catch (\Exception $e) {
        \Log::error($e);
            DB::rollback();
            return back();
      }
     return redirect()->route('edit',['id'=> $id]);
}
  //新規登録画面regist
  public function regist(){
      $product_model = new Product();
      $products= $product_model->getregist();
      $company_model= new Company();
      $companies = $company_model->getregist();
      return view('regist', ['products' => $products,'companies' => $companies]);
}
   
    // 登録処理 
  public function submit(Request $request){
    if ($request->hasFile('img_path') && $request->file('img_path')->isValid()) {
        $img_path = $request->file('img_path')->store('images', 'public');
    } else {
        $img_path = null; 
    }
    $image = $request->file('image');
    if ($image) {
        $file_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $file_name);
        $img_path = 'storage/images/' . $file_name;
    } else {
        $img_path = null;
    }
      $product_model = new Product();
      DB::beginTransaction();
      try {
          $product_model->getSubmit($request, $img_path); 
          DB::commit();
    } catch (\Exception $e) {
          DB::rollback();
          Log::error('Product submit error: ' . $e->getMessage());
          return back()->withErrors(['error' => 'Product submit failed']);
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
}
   