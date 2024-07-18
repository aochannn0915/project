<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Product extends Model

{
    protected $table = ['products'];

    //login
    public function getlogin(){
        $products = DB::table('products')->get();
        return $products;
    }
    //register処理
    public function getregister(){
        $products = DB::table('products')->get();
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
    public function getlist(Request $request){
        $product_model= new Products();
        $products = $product_model->showRelation();
        $company_model= new Companies();
        $companies = $company_model->getAll();
        return view('list',['products' => $products,'companies' => $companies]);
    }
    
    ///検索
     public function getsearch($company_id, $keyword){
         $query= DB::table('products')
         ->join('companies', 'products.company_id', '=', 'companies.id')
         ->select('products.*','companies.company_name');
         if($company_id){
            $query->where('products.company_id', '=', $company_id);
         }
         if($keyword){
         $query->where('products.product_name','like',"%{$keyword}%");
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
     //更新
     public function updateSubmit($request, $id, $img_path){
        $products=DB::table('products')->where('id', $id)
        ->update([
             'product_name' => $request->input('product_name'),
             'company_id'   => $request->input('company_id'),
             'price'        => $request->input('price'),
             'stock'        => $request->input('stock'),
             'comment'      => $request->input('comment'),
             'img_path'     => $img_path
        ]);
          return $products;
    }
    // public function updateSubmitNoImg($request, $id){
    //     $products=DB::table('products')->where('id', $id)
    //     ->update([
    //          'product_name' => $request->input('product_name'),
    //          'company_id'   => $request->input('company_id'),
    //          'price'        => $request->input('price'),
    //          'stock'        => $request->input('stock'),
    //          'comment'      => $request->input('comment'),
    //     ]);
    //       return $products;
    // }
    // 処理
    public function updateOne($request) {
        DB::table('one')->insert([
            'product_name'=>'product_name',
            'company_name'=>'company_name',
            'price'       =>'price',
            'stock'       =>'stock',
            'comment'     =>'comment',
        ]);
    } 
      //新規登録画面regist
    public function getregist() {
        $products = DB::table('products')->get();
        return $products;
    }
     //新規登録処理submit
       public function getSubmit($request, $img_path = null){
        DB::table('products')->insert([
            'product_name' => $request->input('product_name'),
            'company_id' => $request->input('company_id'), 
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'comment' => $request->input('comment'),
            'img_path' => $img_path
        ]);
    }
    // 登録処理
    public function submitOne() {
        DB::table('one')->insert([
            'product_name'=>'product_name',
            'company_name'=>'company_name',
            'price'       =>'price',
            'stock'       =>'stock',
            'comment'     =>'comment',
        ]);
    }
      //削除
     public function deleteProduct($id){
        DB::table('products')->where('id', '=', $id)->delete($id);
    }
}

    

