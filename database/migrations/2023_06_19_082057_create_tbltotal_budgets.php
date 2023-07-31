<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbltotalBudgets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltotal_budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('bud_stps_id');
            $table->string('bud_usr_id');
            $table->string('bud_form_token');
            $table->decimal('bud_total_nrcp', 16, 2)->nullable();
            $table->decimal('bud_total_counter', 16, 2)->nullable();
            $table->decimal('bud_total_other', 16, 2)->nullable();
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
        Schema::dropIfExists('tbltotal_budgets');
    }
}
