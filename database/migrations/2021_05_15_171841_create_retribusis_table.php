<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetribusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retribusis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('towerbts_id');
            $table->foreignId('tahuns_id');
            $table->date('tgl_pembayaran');
            $table->string('status');
            $table->string('tarif');
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
        Schema::dropIfExists('retribusis');
    }
}
