<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblregistrationProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblregistration_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_user_id');
            $table->integer('reg_category');
            $table->integer('sub_category');
            $table->integer('sub2_category')->nullable();
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
        Schema::dropIfExists('tblregistration_profiles');
    }
}
