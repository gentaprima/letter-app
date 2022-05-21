<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Surat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("surat", function ($table) {
            $table->id();
            $table->string('no_agenda');
            $table->date('tgl_terima');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->string('dari');
            $table->string('kepada');
            $table->string('perihal');
            $table->integer('lampiran');
            $table->enum('type', [0, 1]);
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
        //
    }
}
