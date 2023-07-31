<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblpostActivityReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpost_activity_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('post_stps_id');
            $table->string('post_usr_id');
            $table->string('post_form_token');
            $table->string('post_travel_docs')->nullable();
            $table->string('post_csf')->nullable();
            $table->string('post_gb_res')->nullable();
            $table->string('post_remarks')->nullable();
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
        Schema::dropIfExists('tblpost_activity_reports');
    }
}
