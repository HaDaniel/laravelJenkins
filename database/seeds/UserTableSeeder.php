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
             'email' => 'admin@admin.com',
             'password' => bcrypt('admin'),
             'created_at' => Carbon::now()
         ]);
     }
}
