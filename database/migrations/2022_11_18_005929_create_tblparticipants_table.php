<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblparticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblparticipants', function (Blueprint $table) {
            $table->id();
            $table->integer('prt_stps_id');
            $table->integer('prt_id');
            $table->string('prt_name');
            $table->string('prt_age')->nullable();
            $table->string('prt_sex')->nullable();
            $table->string('prt_pos')->nullable();
            $table->string('prt_int')->nullable();
            $table->integer('prt_submit')->default('0');
            $table->string('prt_usr_id');
            $table->string('prt_form_token');
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
        Schema::dropIfExists('tblparticipants');
    }
}
