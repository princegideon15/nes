<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbllogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllogs', function (Blueprint $table) {
            $table->id();
            $table->integer('log_user_id');
            $table->string('log_email')->nullable();
            $table->string('log_description')->nullable();
            $table->string('log_url')->nullable();
            $table->string('log_controller')->nullable();
            $table->string('log_model')->nullable();
            $table->string('log_query')->nullable();
            $table->string('log_ip_address')->nullable();
            $table->string('log_user_agent')->nullable();
            $table->string('log_browser')->nullable();
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
        Schema::dropIfExists('tbllogs');
    }
}
