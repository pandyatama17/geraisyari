<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizings', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->integer('dress_length')->nullable();
            $table->integer('hijab_length')->nullable();
            $table->integer('face_width')->nullable();
            $table->integer('neck_width')->nullable();
            $table->integer('waist_width')->nullable();
            $table->integer('breast_width')->nullable();
            $table->integer('hip_width')->nullable();
            $table->integer('brisket_width')->nullable();
            $table->integer('brisket_length')->nullable();
            $table->integer('shoulder_width')->nullable();
            $table->integer('armpit_width')->nullable();
            $table->integer('arm_width')->nullable();
            $table->integer('arm_length')->nullable();
            $table->integer('elbow_width')->nullable();
            $table->integer('wrist_width')->nullable();
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
        Schema::dropIfExists('sizings');
    }
}
