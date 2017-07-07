<?php

use Illuminate\Database\Seeder;

class list_tahapan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Pengajuan',
        	'nilai' => 'Pengajuan',
        	'jenis' => 'Inhouse',
        ));
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Disain',
        	'nilai' => 'Disain',
        	'jenis' => 'Inhouse',
        ));
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Pengadaan',
        	'nilai' => 'Pengadaan',
        	'jenis' => 'Outsource',
        ));
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Pengembangan',
        	'nilai' => 'Pengembangan',
        	'jenis' => 'Inhouse',
        ));
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Pengujian',
        	'nilai' => 'Pengujian',
        	'jenis' => 'Inhouse',
        ));
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Siap Implementasi',
        	'nilai' => 'Siap Implementasi',
        	'jenis' => 'Inhouse',
        ));
        DB::table('list_tahapan')->insert(array(
        	'nama' => 'Implementasi',
        	'nilai' => 'Implementasi',
        	'jenis' => 'Inhouse',
        ));
    }
}
