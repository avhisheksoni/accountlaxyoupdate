<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_add', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name',50);
            $table->string('contact',20);
            $table->string('email',30);
            $table->string('gstin_no',30);
            $table->string('pan_no',20);
            $table->integer('city_code');
            $table->integer('state_code');
            $table->text('correspondance_address');
            $table->text('registered_address');
            $table->text('note');
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
        Schema::dropIfExists('beneficiary_add');
    }
}
