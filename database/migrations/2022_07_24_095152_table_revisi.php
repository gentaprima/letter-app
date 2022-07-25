<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRevisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("surat",function($table){
            $table->dropColumn("tgl_surat");
            $table->dropForeign("surat_id_instansi_foreign");
            $table->dropColumn("id_instansi");
        });
        Schema::table("surat",function($table){
            $table->string("id_instansi");

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
