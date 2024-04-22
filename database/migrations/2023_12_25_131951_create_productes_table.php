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
        Schema::create('productes', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('product_name');
            $table->string('price');
            $table->string('stock');
            $table->text('comment');
            $table->string('img_path');
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
        Schema::dropIfExists('productes');
    }
};
