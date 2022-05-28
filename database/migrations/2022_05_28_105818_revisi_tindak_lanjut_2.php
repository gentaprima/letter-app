<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevisiTindakLanjut2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat',function($table){
            $table->dropForeign('surat_disposisi_foreign');
            $table->dropColumn('disposisi');            
        });

        Schema::table("tindak_lanjut",function($table){
            $table->unsignedBigInteger("id_surat");
            $table->foreign('id_surat')->references('id')->on('surat')->onDelete('cascade')->onUpdate('cascade');
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
