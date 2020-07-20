<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('production_id');
            $table->integer('worker_id');
            $table->string('manual_worker_name')->nullable();
            $table->string('manual_worker_jobdesk')->nullable();
            $table->bigInteger('fee');
            $table->timestamps();
        });
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('jobdesk',['penjahit','pemotong','penggosok','QC']);
            $table->bigInteger('phone')->nullable();
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
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('workers');
    }
}
