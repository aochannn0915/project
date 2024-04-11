<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Productes extends Model

{
    //login
    public function login(){
        $productes = Productes::all();
        return $productes;
    }
    //register
    public function register() {
        $productes = Productes::all();
        return $productes;
    }
    //リレーション
    public function showRelation(){
        $productes = DB::table('productes')
        ->join('companies', 'productes.company_id', '=', 'companies.id')
        ->select('productes.*','companies.company_name')
        ->get();
        return $productes;
    }
    //一覧画面
    public function getList() {
        $productes = Productes::all();
        return $productes;
    }
    ///検索
    public function searchProductes($keyword,$company_id){
        $query= DB::table('productes')
        ->join('companies', 'productes.company_id', '=', 'companies.id')
        ->select('productes.*','companies.company_name');
        if($company_id){
           $query->where('productes.company_id', '=', $company_id)->get();
        }
       if($keyword){
        $query->where('name','like','%%')->get();
       }
        $productes = $query->get();
        return $productes;
    }
    //詳細
    public function getDetail($id) {
        $productes=Productes::find($id);
        return $productes;
    }
    ///詳細 検索
    public function searchDetail($img_path,$product_name,$company_name, $price,$comment){
        $query= DB::table('productes')
        ->join('companies', 'productes.company_id', '=', 'companies.id')
        ->select('productes.*','companies.company_name');
        if($img_path){
           $query->where('productes.company_id', '=', $company_id);
        }
       if($keyword){
        $query->where('name','like','%%')->get();
       }
        $productes = $query->get();
        return $productes;
    }
    
    //編集
    public function getEdit($id) {
        $productes=Productes::find($id);
        return $productes;
    }   
    
     
    //更新
    public function updateProductes($request, $id){
        DB::table('productes')
           ->where('products.id', '=', $id)
           ->update([
           'product_name' => $request->input('product_name'),
           'company_name' => $request->input('company_name'),
           'price' => $request->input('price'),
           'stock' => $request->input('stock')
        ]);
     }
      //新規登録画面regist
    public function Regist() {
        $productes = DB::table('productes')->get();
        return $productes;
    }
    //新規登録処理
    public function registProduct($request){
        DB::table('productes')->insert([
        'product_name' => $request->input('product_name'),
        'company_name' => $request->input('company_name'),
        'price' => $request->input('price'),
        'stock' => $request->input('stock'),
        ]);
    }
      //削除
     public function deleteProductes($id){
        DB::table('productes')->where('id', '=', $id)->delete();
     }
     
       ///画像
    public function registProductes($image_path){
        DB::table('productes')->insert([
            'image_file' => $image_path
        ]);
}
}

    

