<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbllibOthers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllib_others', function (Blueprint $table) {
            $table->id();
            $table->integer('liboth_stps_id');
            $table->string('liboth_usr_id');
            $table->string('liboth_form_token');
            $table->string('liboth_prt_id')->nullable();
            $table->decimal('liboth_amount', 16, 2)->nullable();
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
        Schema::dropIfExists('tbllib_others');
    }
}
