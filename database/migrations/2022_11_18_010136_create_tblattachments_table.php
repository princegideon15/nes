<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblattachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblattachments', function (Blueprint $table) {
            $table->id();
            $table->integer('att_stps_id');
            $table->string('att_lib');
            $table->string('att_justification')->nullable();
            $table->string('att_req_letter');
            $table->string('att_submit')->default('0');
            $table->string('att_usr_id');
            $table->string('att_form_token');
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
        Schema::dropIfExists('tblattachments');
    }
}
