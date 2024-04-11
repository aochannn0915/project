<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regist', function (Blueprint $table) {
            $table->id();
            $table->increments('id');
            $table->integer('product_name');
            $table->integer('company_name');
            $table->string('price');
            $table->string('stock');
            $table->string('comment');
            $table->timestamps('img_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regist');
    }
};
