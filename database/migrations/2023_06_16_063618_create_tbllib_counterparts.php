<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbllibCounterparts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllib_counterparts', function (Blueprint $table) {
            $table->id();
            $table->integer('cp_stps_id');
            $table->string('cp_usr_id');
            $table->string('cp_form_token');
            $table->string('cp_prt_id')->nullable();
            $table->decimal('cp_amount', 16, 2)->nullable();
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
        Schema::dropIfExists('tbllib_counterparts');
    }
}
