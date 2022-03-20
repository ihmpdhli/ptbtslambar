<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTowerbtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towerbts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('struktur_menaras_id');
            $table->longText('alamat');
            $table->foreignId('operators_id')->nullable();
            $table->foreignId('providers_id');
            $table->foreignId('kecamatans_id');
            $table->foreignId('jaringans_id')->nullable();
            $table->longText('posisi');
            $table->integer('tinggi_tower');
            $table->integer('luas_tanah');
            $table->date('tgl_berdiri');
            $table->longText('pemilik_lahan');
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
        Schema::dropIfExists('towerbts');
    }
}
