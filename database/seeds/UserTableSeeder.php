<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'name' => 'Owner',
         'email' => 'owner@gmail.com',
         'password' => Hash::make('Owner12#'),
         'level' => 'owner',
         'phone' => '0838'
     ]);
     DB::table('users')->insert([
        'name' => 'Admin Gudang 1',
        'email' => 'admingudang1@gmail.com',
        'password' => Hash::make('admingudang1'),
        'level' => 'admin',
        'phone' => '0828'
    ]);
    DB::table('users')->insert([
       'name' => 'Admin Produksi 1',
       'email' => 'adminproduksi@gmail.com',
       'password' => Hash::make('adminproduksi'),
       'level' => 'production',
       'phone' => '0821'
   ]);
    }
}
