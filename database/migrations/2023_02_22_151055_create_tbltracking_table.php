<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbltrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltracking', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('form_token')->nullable();
            $table->string('status')->default('0');
            $table->integer('usr_id');
            $table->string('remarks')->nullable();
            // $table->string('tracking')->nullable();
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
        Schema::dropIfExists('tbltracking');
    }
}
