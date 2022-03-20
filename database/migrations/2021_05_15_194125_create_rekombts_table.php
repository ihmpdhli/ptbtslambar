<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekombtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekombts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('email');
            $table->string('no_telp', 12);
            $table->longText('posisi');
            $table->string('surat_permohonan');
            $table->string('fotocopy_ktp');
            $table->string('surat_izinlokasi');
            $table->string('fotocopy_akta');
            $table->string('gambar_menara');
            $table->string('rencana_anggaran');
            $table->string('jaminan_asuransi');
            $table->string('izin_lingkungan');
            $table->integer('tinggi_tower');
            $table->integer('luas_tanah');
            $table->date('tgl_pengajuan');
            $table->string('status');
            $table->longText('keterangan')->nullable();
            $table->foreignId('users_id');
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
        Schema::dropIfExists('rekombts');
    }
}
