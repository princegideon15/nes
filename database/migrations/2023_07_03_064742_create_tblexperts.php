<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblexperts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblexperts', function (Blueprint $table) {
            $table->id();
            $table->integer('exp_stps_id');
            $table->string('exp_form_token');
            $table->string('exp_title')->nullable();
            $table->string('exp_name');
            $table->string('exp_expertise')->nullable();
            $table->string('exp_email')->nullable();
            $table->string('exp_usr_id');
            $table->string('exp_status')->default(0);
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
        Schema::dropIfExists('tblexperts');
    }
}
