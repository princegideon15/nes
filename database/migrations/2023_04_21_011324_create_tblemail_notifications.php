<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblemailNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemail_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('enc_process_id');
            $table->string('enc_description');
            $table->string('enc_subject');
            $table->string('enc_cc')->nullable();
            $table->string('enc_bcc')->nullable();
            $table->text('enc_content')->nullable();
            $table->string('enc_user_group');
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
        Schema::dropIfExists('tblemail_notifications');
    }
}
