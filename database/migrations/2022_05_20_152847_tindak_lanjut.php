<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TindakLanjut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tindak_lanjut",function($table){
            $table->id();
            $table->unsignedBigInteger('disposisi');
            $table->foreign('disposisi')->references('id')->on('tbl_users');
            $table->date('tanggal');
            $table->string('evaluasi');
            $table->string('tindak_lanjut');
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
