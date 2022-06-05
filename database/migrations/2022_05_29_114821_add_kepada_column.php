<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKepadaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table("tindak_lanjut",function($table){
        //     $table->dropColumn("kepada");
        // });

        Schema::table("surat",function($table){
            $table->string("kepada")->nullable();
            $table->dropColumn("no_agenda");
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
