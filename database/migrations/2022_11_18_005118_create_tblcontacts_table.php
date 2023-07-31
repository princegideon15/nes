<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcontacts', function (Blueprint $table) {
            $table->id();
            $table->string('con_ins');
            $table->string('con_reg')->nullable();
            $table->string('con_prov')->nullable();
            $table->string('con_city')->nullable();
            $table->string('con_brgy')->nullable();
            $table->string('con_address')->nullable();
            $table->string('con_head_ins')->nullable();
            $table->string('con_focal_p')->nullable();
            $table->string('con_contact_num')->nullable();
            $table->string('con_contact_add')->nullable();
            $table->integer('con_submit')->default('0');
            $table->string('con_usr_id');
            $table->string('con_form_token');
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
        Schema::dropIfExists('tblcontacts');
    }
}
