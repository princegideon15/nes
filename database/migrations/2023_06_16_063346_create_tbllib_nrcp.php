<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbllibNrcp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllib_nrcp', function (Blueprint $table) {
            $table->id();
            $table->integer('lib_stps_id');
            $table->string('lib_usr_id');
            $table->string('lib_form_token');
            $table->string('lib_prt_id')->nullable();
            $table->decimal('lib_amount', 16, 2)->nullable();
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
        Schema::dropIfExists('tbllib_nrcp');
    }
}
