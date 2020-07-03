<?php

use Illuminate\Database\Seeder;

class TailorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tailors')->insert([
         'name' => 'mang supra',
         'phone' => '0838'
     ]);
     DB::table('tailors')->insert([
        'name' => 'bang supri',
        'phone' => '0828'
    ]);
    DB::table('tailors')->insert([
       'name' => 'kang supro',
       'phone' => '0821'
   ]);
    }
}
