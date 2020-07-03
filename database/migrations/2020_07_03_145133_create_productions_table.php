<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('order_id')->references('id')->on('orders');
            $table->enum('kind',['new','resew'])->default('new');
            $table->enum('status',[0,1,2,3]);
            $table->date('date_in');
            $table->date('date_out')->nulllable();
            $table->integer('tailor')->nullable();
            $table->integer('delivery_in_id')->unique()->nullable();
            $table->integer('delivery_out_id')->unique()->nullable();
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
        Schema::dropIfExists('productions');
    }
}
