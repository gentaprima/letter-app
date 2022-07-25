<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableInstansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("surat", function ($table) {
            $table->dropColumn("id_instansi");
        });
        Schema::table("surat", function ($table) {
            $table->string("id_instansi")->nullable();
        });
        Schema::dropIfExists('instansi');
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
