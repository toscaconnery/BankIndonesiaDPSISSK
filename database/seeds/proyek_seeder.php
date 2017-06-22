<?php

use Illuminate\Database\Seeder;

class proyek_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyek')->insert(array(
        	'nama' => 'Proyek AAA',
        	'kodema' => 'kode_ma_01',
        	'kategori' => 'Ad-Hoc',
        	'pic' => 'Sherlock Holmes',
        	'status' => 'Not Started',
        	'jenis' => 'Inhouse',
        	'tgl_mulai' => '2018-09-06',
        	'tgl_selesai' => '2018-09-07',
        ));
    }
}