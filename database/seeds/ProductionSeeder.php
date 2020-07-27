<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('productions')->insert([
        'code' => 'P0001',
        'order_id' => 0,
        'status'=>3,
        'date_in' => Carbon::parse('2020-01-01'),
        'date_out' => Carbon::parse('2020-01-10'),
           'pic' => 1,
        'tailor' => 1,
     ]);
     DB::table('productions')->insert([
       'code' => 'P0002',
       'order_id' => 0,
       'status'=>3,
       'date_in' => Carbon::parse('2020-01-01'),
       'date_out' => Carbon::parse('2020-01-10'),
          'pic' => 1,
       'tailor' => 2,
    ]);
        //  DB::table('productions')->insert([
        //    'code' => 'P0003',
        //    'order_id' => 1,
        //    'status'=>'0',
        //    'date_in' => Carbon::now(),
        //    'pic' => 1,
        // ]);
        // DB::table('productions')->insert([
        //   'code' => 'P0004',
        //   'order_id' => 2,
        //   'status'=>'0',
        //   'date_in' => Carbon::now(),
        //   'pic' => 1,
        // ]);
    }
}
