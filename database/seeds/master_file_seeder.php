<?php

use Illuminate\Database\Seeder;

class master_file_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tahap Pengajuan
        DB::table('master_file')->insert(array(
            'nama' => 'Spesifikasi Kebutuhan',
            'tahapan' => 'Pengajuan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Use Case & Effort Estimation',
            'tahapan' => 'Pengajuan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Solusi SI',
            'tahapan' => 'Pengajuan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Proposal',
            'tahapan' => 'Pengajuan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Jadwal',
            'tahapan' => 'Pengajuan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));

        //Disain
        DB::table('master_file')->insert(array(
            'nama' => 'FNDS',
            'tahapan' => 'Disain',
            'jenis' => 'Outsource',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Disain Rinci',
            'tahapan' => 'Disain',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Traceability Matrix',
            'tahapan' => 'Disain',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));

        //Pengembangan
        DB::table('master_file')->insert(array(
            'nama' => 'Dokumentasi Program',
            'tahapan' => 'Pengembangan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Paket Unit Test',
            'tahapan' => 'Pengembangan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Laporan Unit Test',
            'tahapan' => 'Pengembangan',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        
        //Pengujian
        DB::table('master_file')->insert(array(
            'nama' => 'Rencana SIT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Paket SIT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Laporan SIT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Paket Test UAT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Rencana UAT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'BA UAT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Laporan UAT',
            'tahapan' => 'Pengujian',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        
        //Siap Implementasi
        DB::table('master_file')->insert(array(
            'nama' => 'Juknis Instalasi',
            'tahapan' => 'Siap Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Juknis Operasional',
            'tahapan' => 'Siap Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Rencana Deployment',
            'tahapan' => 'Siap Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'BA Migrasi Data',
            'tahapan' => 'Siap Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'BA Serah Terima Operasional',
            'tahapan' => 'Siap Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'BA Serah Terima PSI',
            'tahapan' => 'Siap Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        
        //Implementasi
        DB::table('master_file')->insert(array(
            'nama' => 'Rencana Implementasi',
            'tahapan' => 'Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'Juknis Aplikasi',
            'tahapan' => 'Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        DB::table('master_file')->insert(array(
            'nama' => 'BA Implementasi',
            'tahapan' => 'Implementasi',
            'jenis' => 'Inhouse',
            'created_at' => '2017-06-06',
            'updated_at' => '2017-06-06',
        ));
        
    }
}
