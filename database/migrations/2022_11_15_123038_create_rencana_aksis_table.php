<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_aksis', function (Blueprint $table) {
            $table->id('rencana_id');
            $table->integer('indicator_id');
            $table->integer('department_id');
            $table->integer('tahun');
            $table->integer('semester');
            $table->text('rencana');
            $table->text('target');
            $table->text('output');
            $table->string('waktu_penyelesaian');
            $table->string('penanggung_jawab');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('rencana_aksis');
    }
};
