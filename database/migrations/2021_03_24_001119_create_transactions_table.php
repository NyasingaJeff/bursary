<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->integer("amount");
            $table->string("status")->default("pending");
            $table->unsignedBigInteger("recipientId");
            $table->unsignedBigInteger("senderId")->nullable();
            $table->foreign("senderId")->references("id")->on("users");
            $table->foreign("recipientId")->references("id")->on("users");
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
        Schema::dropIfExists('transactions');
    }
}
