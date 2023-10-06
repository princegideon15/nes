<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblfeedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfeedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('fdbk_rate');
            $table->string('fdbk_remarks')->nullable();
            $table->string('fdbk_user_id');
            $table->integer('fdbk_usr_type');
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
        Schema::dropIfExists('tblfeedbacks');
    }
}
