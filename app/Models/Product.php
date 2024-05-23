<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model

{
    //login
    public function login(){
        $product= Product::all();
        return $product;
    }
    //register
    public function register() {
        $product= Product::all();
        return $product;
    }
    //リレーション
    public function showRelation(){
        $product = DB::table('product')
        ->join('company', 'product.company_id', '=', 'company.id')
        ->select('product.*','company.company_name')
        ->get();
        return $product;
    }
    //一覧画面
    public function getList() {
        $product = Product::all();
        return $product;
    }
    ///検索
    public function searchProduct($keyword,$company_id){
        $query= DB::table('product')
        ->join('company', 'product.company_id', '=', 'company.id')
        ->select('product.*','company.company_name');
        if($company_id){
           $query->where('product.company_id', '=', $company_id)->get();
        }
       if($keyword){
        $product=$query->where('company_id','like','%%')->get();
       }
        $product = $query->get();
        return $product;
    }
    //詳細
    public function getDetail($id) {
        $product=Product::find($id);
        return $product;
    }
    ///詳細 検索
    public function searchDetail($img_path,$product_name,$company_name, $price,$comment){
        $query= DB::table('product')
        ->join('company', 'product.company_id', '=', 'company.id')
        ->select('product.*','company.company_name');
        if($img_path){
           $query->where('product.company_id', '=', $company_id);
        }
       if($keyword){
        $query->where('product.product_name','like','%%')->get();
       }
        $product = $query->get();
        return $product;
    }
    
    //編集
    public function getEdit($id) {
        $product=Product::find($id);
        return $product;
    }        
    //更新
    public function updateProduct($request,$id){
        DB::table('product')
           ->where('product.id', '=', $id)
           ->update([
           'product_name' => $request->input('product_name'),
           'company_name' => $request->input('company_name'),
           'price'        => $request->input('price'),
           'stock'        => $request->input('stock')
        ]);
     }
      //新規登録画面regist
    public function getRegist() {
        $product = DB::table('product')->get();
        return $product;
    }
    //  //新規登録画面regist
    //  public function Form() {
    //      return $productes;
    //  }
     //新規登録処理
      public function submit($request){
         DB::table('product')->insert([
        //  'id'=>$request->input('id'),
         'product_name' => $request->input('product_name'),
         'company_id' => $request->input('company_id'),
         'price' => $request->input('price'),
         'stock' => $request->input('stock'),
         'comment' => $request->input('comment'),
         'img_path' => $request->input('img_path'),
         ]);
       }
      //削除
     public function deleteProduct($id){
        DB::table('product')->where('id', '=', $id)->delete();
     }
     
       ///画像
    public function registProduct($img_path){
        DB::table('product')->insert([
            'image_file' => $img_path
        ]);
}
}

    

