<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyParty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_party', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->foreign('company_id')->references('id')->on('company_mast');
            $table->string('company_party');
            $table->string('party_code');
            $table->string('code_gen');
            $table->string('addtional2');
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
        Schema::dropIfExists('company_party');
    }
}
