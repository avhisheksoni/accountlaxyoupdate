<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentralPartyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('central_party', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('party_name',50);
            $table->string('company_name',20);
            $table->string('email',30);
            $table->string('gstin_no',30);
            $table->string('pan_no',20);
            $table->integer('city_code');
            $table->integer('state_code');
            $table->string('contact',20);
            $table->text('postal_address');
            $table->text('registered_address');
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
        Schema::dropIfExists('central_party');
    }
}
