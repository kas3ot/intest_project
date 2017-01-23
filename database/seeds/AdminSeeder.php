<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@intes.com',
            'password' => bcrypt('admin'),
        ]);
    }
    
}
