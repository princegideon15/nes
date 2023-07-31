<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblfinalizationBAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfinalization_b_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('fin_stps_id');
            $table->string('fin_usr_id');
            $table->string('fin_form_token');
            $table->string('fin_draft');
            $table->string('fin_activity_design');
            $table->string('fin_program');
            $table->string('fin_mechanics');
            $table->string('fin_promo_materials')->nullable();
            $table->string('fin_invi_letter');
            $table->string('fin_collaterals')->nullable();
            $table->string('fin_remarks')->nullable();
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
        Schema::dropIfExists('tblfinalization_b_attachments');
    }
}
