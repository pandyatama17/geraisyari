<?php

use Illuminate\Database\Seeder;

class StoreInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_inventory')->insert([
          'production_id' => '2',
          'model_id' => 4,
          'material_id' => 2,
          'color'=>9,
          'size'=> 'custom',
          'quantity'=> 1,
       ]);
       DB::table('store_inventory')->insert([
         'production_id' => '2',
         'model_id' => 5,
         'material_id' => 1,
         'color'=>1,
         'niqab' => 1,
         'pet' => 1,
         'size'=> 'custom',
         'quantity'=> 1,
      ]);

      DB::table('sizings')->insert([
        // production id is parent id of sizings
        'parent_id' => 2,
        'dress_length' => 180,
        'hijab_length' => 60,
        'face_width'=>30,
        'neck_width' => 20,
        'waist_width' => 80,
        'breast_width'=> 60,
        'hip_width'=> 80,
        'brisket_width'=> 80,
        'brisket_length'=> 12,
        'shoulder_width'=> 23,
        'armpit_width'=> 26,
        'arm_width'=> 20,
        'arm_length'=> 50,
        'elbow_width'=> 123,
        'wrist_width'=> 10,
     ]);
    }
}
