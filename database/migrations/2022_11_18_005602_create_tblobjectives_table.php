<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblobjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblobjectives', function (Blueprint $table) {
            $table->id();
            $table->integer('obj_stps_id');
            $table->string('obj_1');
            $table->string('obj_2');
            $table->string('obj_3');
            $table->string('obj_4')->nullable();
            $table->string('obj_5')->nullable();
            $table->string('obj_gender');
            $table->string('obj_sdg');
            $table->integer('obj_submit')->default('0');
            $table->string('obj_usr_id');
            $table->string('obj_form_token');

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
        Schema::dropIfExists('tblobjectives');
    }
}
