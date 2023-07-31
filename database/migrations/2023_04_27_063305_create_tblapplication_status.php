<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblapplicationStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblapplication_status', function (Blueprint $table) {
            $table->id();
            $table->integer('app_stps_id');
            $table->string('app_status');
            $table->string('app_usr_id');
            $table->string('app_form_token');
            $table->string('app_remarks')->nullable();
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
        Schema::dropIfExists('tblapplication_status');
    }
}
