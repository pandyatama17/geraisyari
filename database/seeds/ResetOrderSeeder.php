<?php

use Illuminate\Database\Seeder;

class ResetOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::raw("delete from orders where id > 0");
      DB::raw("alter table orders auto_increment = 1");
      // DB::raw("delete from productions where id > 0");
      // DB::raw("alter table productions auto_increment = 1");
      DB::raw("delete from sizings where id > 0");
      DB::raw("alter table sizings auto_increment = 1");
      DB::raw("delete from pricing_and_payments where id > 0");
      DB::raw("alter table pricing_and_payments auto_increment = 1");
      DB::raw("delete from pricing_details where id > 0");
      DB::raw("alter table pricing_details auto_increment = 1");
    }
}
