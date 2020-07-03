<?php

use Illuminate\Database\Seeder;

class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('models')->insert([
          'code' => 'GAM001',
          'image' => 'GAM001.jpg',
          'name' => 'Gamis Pria',
          'kind' => 'etc',
          'kind_name'=> 'Gamis',
          'has_niqab' => false,
          'base_price' => '75000',
          'description' =>'Gamis pria trendy. keren abis akh~!'
     ]);
     DB::table('models')->insert([
         'code' => 'FK001-DRS',
         'image' => 'FK001.jpg',
         'name' => 'FK series Fatimah',
         'kind' => 'clothes',
         'has_niqab' => false,
         'base_price' => '150000',
         'description' => 'FK series Fatimah bahan shifon arab'
    ]);
    DB::table('models')->insert([
        'code' => 'FK001-HJB',
        'image' => 'FK001.jpg',
        'name' => 'FK series Fatimah Hijab',
        'kind' => 'hijab',
        'has_niqab' => false,
        'base_price' => '50000',
        'description' => 'FK series Fatimah bahan shifon arab'
   ]);
   DB::table('models')->insert([
       'code' => 'FK002-DRS',
       'image' => 'FK002.jpg',
       'name' => 'FK series Amir',
       'kind' => 'clothes',
       'has_niqab' => false,
       'base_price' => '175000',
       'description' => 'FK  Amir'
  ]);
  DB::table('models')->insert([
      'code' => 'FK002-HJB',
      'image' => 'FK002.jpg',
      'name' => 'FK series Amir Hijab',
      'kind' => 'hijab',
      'has_niqab' => true,
      'base_price' => '50000',
      'description' => 'FK series Amir bahan shifon arab'
 ]);
    // DB::table('models')->insert([
    //      'code' => '',
    //      'image' => '',
    //      'name' => '',
    //      'kind' => '',
    //      'has_niqab' => false,
    //      'base_price' => '',
    //      'description' =>
    // ]);
    //  DB::table('models')->insert([
    //      'code' => '',
    //      'image' => '',
    //      'name' => '',
    //      'kind' => '',
    //      'has_niqab' => false,
    //      'base_price' => '',
    //      'description' =>
    // ]);
    }
}
