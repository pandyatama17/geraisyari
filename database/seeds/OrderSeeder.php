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
      DB::table('orders')->insert([
        'id' => 0,
        'code' => 'O0000',
        'client_name' => 'Stok Toko',
     ]);
    }
}
