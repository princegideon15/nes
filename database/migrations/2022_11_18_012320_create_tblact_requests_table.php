<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblactRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblact_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('act_stps_id');
            $table->string('act_req_id')->nullable();
            $table->string('act_spec_act')->nullable();
            $table->string('act_start')->nullable();
            $table->string('act_end')->nullable();
            $table->string('act_req_oth')->nullable();
            $table->integer('act_submit')->default('0');
            $table->string('act_usr_id');
            $table->string('act_form_token');
            
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
        Schema::dropIfExists('tblact_requests');
    }
}
