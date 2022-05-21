<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arsip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("arsip",function($table){
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_surat')->references('id')->on('surat');
            $table->date("tanggal_arsip");
            $table->string("diteruskan_ke");
            $table->string("keterangan");
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
