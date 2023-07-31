<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblpersonalProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpersonal_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('pp_member');
            $table->integer('pp_title');
            $table->string('pp_last_name');
            $table->string('pp_middle_name')->nullable();
            $table->string('pp_first_name');
            $table->string('pp_suffix_name')->nullable();
            $table->string('pp_extension')->nullable();
            $table->string('pp_age');
            $table->integer('pp_sex');
            $table->integer('pp_region');
            $table->integer('pp_prov');
            $table->integer('pp_city');
            $table->string('pp_brgy')->nullable();
            $table->string('pp_ins')->nullable();
            $table->string('pp_pos')->nullable();
            $table->string('pp_user_id');
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
        Schema::dropIfExists('tblpersonal_profiles');
    }
}
