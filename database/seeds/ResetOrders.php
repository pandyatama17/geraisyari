<?php

use Illuminate\Database\Seeder;

class ResetOrders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::update("delete from orders where id > 0");
      DB::update("delete from productions where id > 0");
      DB::update("alter table productions auto_increment = 1");
      DB::update("alter table orders auto_increment = 1");
      DB::update("delete from order_details where id > 0");
      DB::update("alter table order_details auto_increment = 1");
      DB::update("delete from sizings where id > 0");
      DB::update("alter table sizings auto_increment = 1");
      DB::update("delete from pricing_and_payments where id > 0");
      DB::update("alter table pricing_and_payments auto_increment = 1");
      DB::update("delete from pricing_details where id > 0");
      DB::update("alter table pricing_details auto_increment = 1");
    }
}
