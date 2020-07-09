<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomSizingsToStoreInventoryAndOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->boolean('has_custom_sizing')->default(0)->after('size');
        });
        Schema::table('store_inventory', function (Blueprint $table) {
            $table->boolean('has_custom_sizing')->default(0)->after('size');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_inventory_and_order_details', function (Blueprint $table) {
            //
        });
    }
}
