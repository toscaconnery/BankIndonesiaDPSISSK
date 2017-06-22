<?php

use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        	'name' => 'Administrator',
        	'nip' => '123456',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456'),
        ));
    }
}