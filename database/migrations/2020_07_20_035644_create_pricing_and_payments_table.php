<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingAndPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_and_payments', function (Blueprint $table)
        {
            $table->id();
            $table->integer('order_id');
            $table->bigInteger('base_price')->default(0);
            $table->bigInteger('discount')->default(0);
            $table->bigInteger('tax')->default(0);
            $table->bigInteger('delivery_fee')->default(0);
            // 0 : not_paid; 1: down_payment; 2: paid; 3: paid_off,
            $table->enum('payment_status',['0','1','2','3'])->default('0');
            $table->bigInteger('down_payment')->default(0);
            $table->bigInteger('paid')->default(0);
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
        Schema::dropIfExists('pricing_and_payments');
    }
}
