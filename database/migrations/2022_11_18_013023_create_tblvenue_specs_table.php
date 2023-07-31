<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblvenueSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblvenue_specs', function (Blueprint $table) {
            $table->id();
            $table->integer('ven_stps_id');
            $table->string('ven_spec');
            $table->string('ven_spec_oth')->nullable();
            $table->string('ven_address');
            $table->integer('ven_submit')->default('0');
            $table->string('ven_usr_id');
            $table->string('ven_form_token');
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
        Schema::dropIfExists('tblvenue_specs');
    }
}
