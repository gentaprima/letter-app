<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CascadeUpdateDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('surat',function($table){
            $table->dropForeign('surat_id_users_foreign');
            $table->dropForeign('surat_id_instansi_foreign');
            $table->foreign('id_instansi')->references('id')->on('instansi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_users')->references('id')->on('tbl_users')->onDelete('cascade')->onUpdate('cascade');
            $table->dropColumn('is_disposisi');
        });
        
        Schema::table('arsip',function($table){
            $table->dropForeign('arsip_id_surat_foreign');
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
