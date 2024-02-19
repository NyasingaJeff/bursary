<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropertiesOnTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string("bank")->nullable();
            $table->string("accNumber")->nullable();
            $table->string("beneficiaryName")->nullable();
            $table->string("narrative")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColomn('bank');
            $table->dropColomn('accNumber');
            $table->dropColomn('beneficiaryName');
            $table->dropColomn('narrative');

        });
    }
}
