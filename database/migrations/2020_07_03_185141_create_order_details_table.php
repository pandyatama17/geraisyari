<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
          $table->id();
          $table->integer('parent_id');
          // model baju atau kerudung
          $table->integer('model_id');
          // bahan
          $table->integer('material_id');
          $table->integer('color');
          $table->boolean('niqab')->default(false);
          $table->boolean('pet')->default(false);
          $table->enum('size',['S','M','L','XL','XXL','XXXL','custom']);
          $table->integer('quantity')->default(1);
          $table->longText('description')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
