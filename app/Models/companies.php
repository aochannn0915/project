<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class companies extends Model
{
    public function getAll(){
        $companies=Companies::all();
        return $companies;
    }
   
    public function registProductes($image_path){
         DB::table('productes')->insert([
        'image_file' => $image_path
        ]);
    }

    
    public function getRegist() {
        $productes = DB::table('productes')->get();

        return $productes;
       
    }
    public function getDetail() {
        $productes = DB::table('productes')->get();

        return $productes;
       
    }
    public function getEdit() {
        $productes = DB::table('productes')->get();

        return $productes;
       
    }
}
