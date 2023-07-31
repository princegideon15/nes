<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblevaluationBAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblevaluation_b_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('eva_stps_id');
            $table->string('eva_usr_id');
            $table->string('eva_form_token');
            $table->string('eva_draft');
            $table->string('eva_evaluation_results');
            $table->string('eva_activity_design');
            $table->string('eva_program');
            $table->string('eva_mechanics');
            $table->string('eva_lib');
            $table->string('eva_endo_letter');
            $table->string('eva_remarks')->nullable();
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
        Schema::dropIfExists('tblevaluation_b_attachments');
    }
}
