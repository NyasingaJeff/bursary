<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToBeneficiaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            //
            $table->string('name');
            $table->string('location');
            $table->string('idNo')->nullable();
            $table->string('yrOfCmpltn');
            $table->string('levelOfCert');
            $table->string('dob');
            $table->string('fundingLvl');
            $table->unsignedBigInteger("mainId");
            $table->foreign('mainId')->references('id')->on('users');
            $table->string('idNumber')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            //
        });
    }
}
