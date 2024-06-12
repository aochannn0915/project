<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model

{
    protected $table = ['products'];

    //login
    public function getlogin(){
        $products= Product::all();
        return $products;
    }
    //register
    public function getregister(){
        $products= Product::all();
        return $products;
    }
    //リレーション
    public function showRelation(){
        $products = DB::table('products')
        ->join('companies', 'products.company_id', '=', 'companies.id')
        ->select('products.*','companies.company_name')
        ->get();
        return  $products;
    }
    //一覧画面
    public function getlist(){
        $products = Product::all();
        return $products;
    }
    ///検索
    public function getsearch($keyword,$company_id){
        $query= DB::table('products')
        ->join('companies', 'products.company_id', '=', 'companies.id')
        ->select('products.*','companies.company_name');
        if($company_id){
           $query->where('products.company_id', '=', $company_id)->get();
        }
        if($keyword){
        $products=$query->where('company_id','like','%%')->get();
        }
        $products = $query->get();
        return $products;
    }
    //詳細
    public function getdetail($id) {
        $products = DB::table('products')
        ->select('products.*','companies.company_name')
        ->join('companies', 'products.company_id', '=', 'companies.id')
        ->where('products.id', '=', $id)
        ->first();
        return $products;
    }
    
    //編集
    public function getedit($id) {
         $products=DB::table('products')
         ->join('companies', 'products.company_id', '=', 'companies.id')
        ->where('products.id', '=', $id)
        ->first();
        return $products;
    }      
    //編集処理
    public function display($request,$img_path){
        DB::table('products')->insert([
          'product_name' => $request->input('product_name'),
          'company_name' => $request->input('company_name'),
          'price'        => $request->input('price'),
          'stock'        => $request->input('stock'),
          'comment'      => $request->input('comment'),
          'img_path'     => $img_path
        ]);
    }
   
    //更新
    public function updateSubmit($id){
        DB::table('products')->where('id', '=', $id)->updateSubmit();
     }
      //新規登録画面regist
    public function getregist() {
        $products = DB::table('products')->get();
        return $products;
    }
     //新規登録処理
      public function submit($request){
         DB::table('products')->insert([
         'product_name' => $request->input('product_name'),
         'company_id' => $request->input('company_name'),
         'price' => $request->input('price'),
         'stock' => $request->input('stock'),
         'comment' => $request->input('comment'),
         'img_path' => $img_path
         ]);
       }
      //削除
     public function deleteSubmit($id){
        DB::table('products')->where('id', '=', $id)->deleteSubmit($id);
     }
}

    

