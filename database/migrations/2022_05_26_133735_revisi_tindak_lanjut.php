<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevisiTindakLanjut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table("tindak_lanjut",function($table){
            $table->dropForeign("tindak_lanjut_disposisi_foreign");
        });

        Schema::table("surat",function($table){
            $table->unsignedBigInteger("disposisi");
            $table->foreign('disposisi')->references('id')->on('tindak_lanjut');
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
