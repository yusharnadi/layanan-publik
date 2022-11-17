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
        Schema::create('tindak_lanjuts', function (Blueprint $table) {
            $table->id('tindak_id');
            $table->integer('indicator_id');
            $table->integer('department_id');
            $table->integer('tahun');
            $table->integer('semester');
            $table->integer('status_tindak');
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
        Schema::dropIfExists('tindak_lanjuts');
    }
};
