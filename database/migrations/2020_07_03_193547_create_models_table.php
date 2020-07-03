<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
          $table->id();
          $table->string('code')->unique();
          $table->string('image');
          $table->string('name')->unique();
          $table->enum('kind',['clothes','hijab','etc']);
          $table->string('kind_name')->nullable();
          $table->boolean('has_niqab')->default(false);
          $table->integer('base_price');
          $table->longText('description');
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
        Schema::dropIfExists('models');
    }
}
