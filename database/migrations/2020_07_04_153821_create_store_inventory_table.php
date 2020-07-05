<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('production_id');
            $table->integer('model_id');
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
        Schema::dropIfExists('store_inventory');
    }
}
