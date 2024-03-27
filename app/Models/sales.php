<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sales extends Model
{
    //use HasFactory;
    public function getList() {
        // productesテーブルからデータを取得
        $productes = DB::table('productes')->get();

        return $productes;
    
    }
    public function getRegist() {
        // productesテーブルからデータを取得
        $productes = DB::table('productes')->get();

        return $productes;
    }
        public function registProductes($image_path){
            DB::table('productes')->insert([
                'image_file' => $image_path
            ]);
        }
   
    public function getDetail() {
        // productesテーブルからデータを取得
        $productes = DB::table('productes')->get();

        return $productes;
       
    }
    public function getEdit() {
        // productesテーブルからデータを取得
        $productes = DB::table('productes')->get();

        return $productes;
       
    }
}

