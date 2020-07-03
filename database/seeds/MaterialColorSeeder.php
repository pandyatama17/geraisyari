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
         'name'=> 'merah',
         'stock' => '100',
     ]);
     DB::table('material_colors')->insert([
       'parent_id' => '1',
       'name'=> 'biru',
       'stock' => '50',
     ]);
     DB::table('material_colors')->insert([
      'parent_id' => '1',
      'name'=> 'hitam',
      'stock' => '38',
    ]);
    DB::table('material_colors')->insert([
       'parent_id' => '1',
       'name'=> 'Hijau',
       'stock' => '123',
     ]);
     DB::table('material_colors')->insert([
        'parent_id' => '1',
        'name'=> 'Krem',
        'stock' => '93',
     ]);
     DB::table('material_colors')->insert([
       'parent_id' => '2',
       'name'=> 'biru',
       'stock' => '38',
     ]);DB::table('material_colors')->insert([
        'parent_id' => '2',
        'name'=> 'merah',
        'stock' => '12',
    ]);
    DB::table('material_colors')->insert([
      'parent_id' => '2',
      'name'=> 'biru',
      'stock' => '48',
    ]);
    DB::table('material_colors')->insert([
     'parent_id' => '2',
     'name'=> 'hitam',
     'stock' => '72',
   ]);
   DB::table('material_colors')->insert([
      'parent_id' => '2',
      'name'=> 'Hijau',
      'stock' => '18',
    ]);
    DB::table('material_colors')->insert([
       'parent_id' => '2',
       'name'=> 'Krem',
       'stock' => '94',
    ]);
    }
}
