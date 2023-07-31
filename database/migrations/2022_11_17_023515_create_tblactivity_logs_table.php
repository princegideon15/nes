<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblactivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblactivity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('log_user_id')->nullable();
            $table->string('log_email')->nullable();
            $table->string('log_description');
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
        Schema::dropIfExists('tblactivity_logs');
    }
}
