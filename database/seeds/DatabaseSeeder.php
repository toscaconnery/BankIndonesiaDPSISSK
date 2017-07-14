<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(user_seeder::class);
        $this->call(master_file_seeder::class);
        $this->call(list_tahapan_seeder::class);
        $this->call(whitelist_type_seeder::class);
        //$this->call(proyek_seeder::class);
    }
}
