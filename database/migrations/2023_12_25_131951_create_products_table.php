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
        Schema::create('products', function (Blueprint $table) {
            $table->biginteger('id');
            $table->bigint('company_id');
            $table->varcher('product_name');
            $table->varchar('price');
            $table->varcahr('stock');
            $table->text('comment');
            $table->varchar('img_path');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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
        Schema::dropIfExists('products');
    }
};
