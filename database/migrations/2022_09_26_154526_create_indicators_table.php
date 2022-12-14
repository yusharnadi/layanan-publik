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
        Schema::create('indicators', function (Blueprint $table) {
            $table->id('indicator_id');
            $table->string('indicator_code');
            $table->text('indicator_name');
            $table->text('indicator_description');
            $table->string('doc_1');
            $table->string('doc_2')->nullable();
            $table->string('doc_3')->nullable();
            $table->string('doc_4')->nullable();
            $table->string('skala_0')->nullable();
            $table->string('skala_1')->nullable();
            $table->string('skala_2')->nullable();
            $table->string('skala_3')->nullable();
            $table->string('skala_4')->nullable();
            $table->string('skala_5')->nullable();
            $table->double('indicator_bobot')->nullable();
            $table->tinyInteger('aspect_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicators');
    }
};
