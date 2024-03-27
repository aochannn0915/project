<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class companies extends Model
{
    
    public function getCompany(){
        $companies=DB::table('companies')->get();
        return $companies;
    }
//public function getList() {
        // productesテーブルからデータを取得
       // $productes = DB::table('productes')->get();
          //  return $productes;
       // }
        public function registProductes($image_path){
            DB::table('productes')->insert([
                'image_file' => $image_path
            ]);
        }

    //     return $productes;
    //     DB::table('productes')->insert([
    //         'name' => $data->company_name,
    //         'adress' => $data->street_adress,
    //         'name' => $data->representative_name,
    //         'creat' => $data->created_at,
    //         'update' => $data->updated_at,
    //     ]);
    // }
    public function getRegist() {
        // productesテーブルからデータを取得
        $productes = DB::table('productes')->get();

        return $productes;
       
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
