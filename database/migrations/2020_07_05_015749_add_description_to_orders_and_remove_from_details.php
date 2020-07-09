<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToOrdersAndRemoveFromDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('description');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->longText('notes')->after('client_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_and_remove_from_details', function (Blueprint $table) {
          Schema::table('order_details', function (Blueprint $table) {
              $table->longText('description');
          });
          Schema::table('orders', function (Blueprint $table) {
              $table->dropColumn('notes');
          });
        });
    }
}
