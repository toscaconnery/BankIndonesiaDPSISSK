<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelengkapanProyek extends Model
{
    protected $table = 'kelengkapan_proyek';
    protected $fillable = [
    	'id_proyek', 'spesifikasi_kebutuhan', 'use_case_effort_estimation',
    	'solusi_si', 'proposal', 'jadwal',
    	'fnds', 'disain_rinci', 'traceability_matrix',
    	'dokumentasi_program', 'paket_unit_test', 'laporan_unit_test',
    	'rencana_sit', 'paket_sit', 'laporan_sit',
    	'paket_test_uat', 'rencana_uat', 'ba_uat',
    	'laporan_uat', 'juknis_instalasi', 'juknis_operasional',
    	'rencana_deployment', 'ba_migrasi_data', 'ba_serah_terima_operasional',
    	'ba_serah_terima_psi', 'rencana_implementasi', 'juknis_aplikasi',
    	'ba_implementasi',
    ];
}