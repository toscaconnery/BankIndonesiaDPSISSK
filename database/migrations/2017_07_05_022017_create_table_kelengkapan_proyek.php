<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelengkapanProyek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapan_proyek', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyek');
            $table->string('spesifikasi_kebutuhan');
            $table->string('use_case_effort_estimation');
            $table->string('solusi_si');
            $table->string('proposal');
            $table->string('jadwal');
            $table->string('fnds');
            $table->string('disain_rinci');
            $table->string('traceability_matrix');
            $table->string('dokumentasi_program');
            $table->string('paket_unit_test');
            $table->string('laporan_unit_test');
            $table->string('rencana_sit');
            $table->string('paket_sit');
            $table->string('laporan_sit');
            $table->string('paket_test_uat');
            $table->string('rencana_uat');
            $table->string('ba_uat');
            $table->string('laporan_uat');
            $table->string('juknis_instalasi');
            $table->string('juknis_operasional');
            $table->string('rencana_deployment');
            $table->string('ba_migrasi_data');
            $table->string('ba_serah_terima_operasional');
            $table->string('ba_serah_terima_psi');
            $table->string('rencana_implementasi');
            $table->string('juknis_aplikasi');
            $table->string('ba_implementasi');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelengkapan_proyek');
    }
}
