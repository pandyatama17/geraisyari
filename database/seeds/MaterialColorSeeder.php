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
         'color'=> 'merah',
         'stock' => '100',
     ]);
     DB::table('material_colors')->insert([
       'parent_id' => '1',
       'color'=> 'biru',
       'stock' => '50',
     ]);
     DB::table('material_colors')->insert([
      'parent_id' => '1',
      'color'=> 'hitam',
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
       'parent_id' => '2',
       'color'=> 'biru',
       'stock' => '38',
     ]);DB::table('material_colors')->insert([
        'parent_id' => '2',
        'color'=> 'merah',
        'stock' => '12',
    ]);
    DB::table('material_colors')->insert([
      'parent_id' => '2',
      'color'=> 'biru',
      'stock' => '48',
    ]);
    DB::table('material_colors')->insert([
     'parent_id' => '2',
     'color'=> 'hitam',
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
    }
}
