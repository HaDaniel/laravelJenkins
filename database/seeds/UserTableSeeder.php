<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

         DB::table('users')->insert([
             'id' => '1',
             'name' => 'administrateur',
             'email' => 'ha_daniel@hotmail.fr',
             'password' => bcrypt('000000'),
             'created_at' => Carbon::now()
         ]);
     }
}
