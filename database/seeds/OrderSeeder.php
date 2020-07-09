<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // DB::table('orders')->insert([
          //   'id' => 0,
          //   'code' => 'O0000',
          //   'client_name' => 'Stok Toko',
          // ]);
          DB::table('orders')->insert([
            'code' => 'O0003',
            'client_name' => 'Suparmin',
            'client_phone' => '1239823',
            'notes' => 'jangan pake mie kuning',
            'pic' => 1,
          ]);
          DB::table('order_details')->insert([
           'parent_id' => '3',
           'model_id' => 2,
           'material_id' => 1,
           'color' => 3,
           'niqab' => 0,
           'pet' => 1,
           'size' => 'M',
           'has_custom_sizing' => 0,
         ]);
         DB::table('order_details')->insert([
          'parent_id' => '3',
          'model_id' => 3,
          'material_id' => 1,
          'color' => 3,
          'niqab' => 0,
          'pet' => 1,
          'size' => 'M',
          'has_custom_sizing' => 0,
        ]);
      //   DB::table('resellers')->insert([
      //      'name' => 'Agen Beras Plastik',
      //      'email' => 'agenberasterplastix@gmail.com',
      //      'phone' => '08318',
      //      'address' => 'jl. kenangan'
      //  ]);
      //  DB::table('resellers')->insert([
      //     'name' => 'Agen Minyak Terpercaya',
      //     'email' => 'agenminyakterpercaya@gmail.com',
      //     'phone' => '12323',
      //     'address' => 'jl. batuk pilek'
      // ]);
       DB::table('orders')->insert([
          'code' => 'O0004',
          'reseller' => 1,
          'reseller_id' => '2',
          'notes' => 'baksonya urat aja bang. gapapa dikit',
          'pic' => 1,
        ]);
        DB::table('order_details')->insert([
           'parent_id' => '4',
           'model_id' => 4,
           'material_id' => 2,
           'color' => 10,
           'niqab' => 0,
           'pet' => 0,
           'quantity' => 5,
           'size' => 'XL',
         ]);
         DB::table('order_details')->insert([
          'parent_id' => '4',
          'model_id' => 4,
          'material_id' => 2,
          'color' => 10,
          'niqab' => 0,
          'pet' => 0,
          'quantity' => 5,
          'size' => 'XL',
        ]);
        // DB::table('order_details')->insert([
        //    'parent_id' => '3',
        //    'model_id' => 4,
        //    'material_id' => 2,
        //    'color' => 10,
        //    'niqab' => 0,
        //    'pet' => 0,
        //    'quantity' => 5,
        //    'size' => 'S',
        // ]);
        //  DB::table('order_details')->insert([
        //   'parent_id' => '3',
        //   'model_id' => 4,
        //   'material_id' => 2,
        //   'color' => 10,
        //   'niqab' => 0,
        //   'pet' => 0,
        //   'quantity' => 5,
        //   'size' => 'S',
        // ]);
    }
}
