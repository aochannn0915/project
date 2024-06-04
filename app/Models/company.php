<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class company extends Model
{
    protected $table = "companies";

     public function getAll(){
     $companies=DB::table('companies')->get();
     return $companies;
    }
   //新規登録画面regist
   public function getregist() {
    $companies = DB::table('companies')->get();
    return $companies;
    }
    // public function regist($image_path){
    //      DB::table('products')->insert([
    //     'image_file' => $image_path
    //     ]);
    // }   
    // public function getRegist() {
    //     $products = DB::table('products')->get();

    //     return $products;
       
    // }
    // public function getDetail() {
    //     $products = DB::table('products')->get();
    //     return $products;
    // }
    // public function getEdit($id) {
    //     $products = DB::table('products')->get($id);
    //     return $products;
    // }
}
