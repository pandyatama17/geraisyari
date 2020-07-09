<?php

use Illuminate\Database\Seeder;

class MaterialColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('material_colors')->insert([
         'parent_id' => '1',
         'color'=> 'Merah',
         'stock' => '100',
     ]);
     DB::table('material_colors')->insert([
       'parent_id' => '1',
       'color'=> 'Biru',
       'stock' => '50',
     ]);
     DB::table('material_colors')->insert([
      'parent_id' => '1',
      'color'=> 'Hitam',
      'stock' => '38',
    ]);
    DB::table('material_colors')->insert([
       'parent_id' => '1',
       'color'=> 'Hijau',
       'stock' => '123',
     ]);
     DB::table('material_colors')->insert([
        'parent_id' => '1',
        'color'=> 'Krem',
        'stock' => '93',
     ]);
     DB::table('material_colors')->insert([
        'parent_id' => '1',
        'color'=> 'Ungu',
        'stock' => '51',
     ]);
     DB::table('material_colors')->insert([
       'parent_id' => '2',
       'color'=> 'Biru',
       'stock' => '38',
     ]);DB::table('material_colors')->insert([
        'parent_id' => '2',
        'color'=> 'Merah',
        'stock' => '12',
    ]);
    DB::table('material_colors')->insert([
     'parent_id' => '2',
     'color'=> 'Hitam',
     'stock' => '72',
   ]);
   DB::table('material_colors')->insert([
      'parent_id' => '2',
      'color'=> 'Hijau',
      'stock' => '18',
    ]);
    DB::table('material_colors')->insert([
       'parent_id' => '2',
       'color'=> 'Krem',
       'stock' => '94',
    ]);
    DB::table('material_colors')->insert([
       'parent_id' => '2',
       'color'=> 'Ungu',
       'stock' => '61',
    ]);
    // colors
    DB::table('available_colors')->insert([
        'color'=> 'Merah',
        'real_color'=> 'red',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Marun',
       'real_color'=> 'maroon',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Pink',
       'real_color'=> 'fuchsia',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Ungu',
       'real_color'=> 'purple',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Biru',
       'real_color'=> 'blue',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Biru Muda',
       'real_color'=> 'lightblue',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Biru Donker',
       'real_color'=> 'navy',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Cokelat',
       'real_color'=> 'brown',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Krem',
       'real_color'=> 'orange disabled',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Kuning',
       'real_color'=> 'yellow',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Hijau',
       'real_color'=> 'green',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Hijau Tua',
       'real_color'=> 'olive',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Hitam',
       'real_color'=> 'black',
    ]);
    DB::table('available_colors')->insert([
       'color'=> 'Putih',
       'real_color'=> 'white',
    ]);
    }
}
