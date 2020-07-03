<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('materials')->insert([
         'name' => 'kain arab motif',
         'price' => '10000',
     ]);
     DB::table('materials')->insert([
        'name' => 'shifron arab motif',
        'price' => '12000',
    ]);
    DB::table('materials')->insert([
       'name' => 'frula',
       'price' => '15000',
   ]);
   DB::table('materials')->insert([
      'name' => 'madam queen',
      'price' => '18000',
  ]);
    }
}
