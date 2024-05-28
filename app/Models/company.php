<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class company extends Model
{
    public function getAll(){
        $company=Company::all();
        return $company;
    }
   //新規登録画面regist
   public function getRegist() {
    $company = DB::table('company')->get();
    return $product;
}
    public function regist($image_path){
         DB::table('product')->insert([
        'image_file' => $image_path
        ]);
    }   
    // public function getRegist() {
    //     $products = DB::table('products')->get();

    //     return $products;
       
    // }
    public function getDetail() {
        $product = DB::table('product')->get();
        return $product;
    }
    public function getEdit($id) {
        $product = DB::table('product')->get($id);
        return $product;
    }
}
