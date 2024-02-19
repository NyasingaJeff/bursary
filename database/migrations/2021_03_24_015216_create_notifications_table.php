<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->unsignedBigInteger("senderId");
            $table->unsignedBigInteger("recipientId");
            $table->string("status")->default("unread");
            $table->text("message");
            $table->timestamps();
            $table->foreign("senderId")->references('id')->on("users");
            $table->foreign("recipientId")->references('id')->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
