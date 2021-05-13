<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_request', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->integer('beneficiary_id')->unsigned();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiary');
            $table->integer('job_id');
            $table->foreign('job_id')->references('id')->on('job_master');
            $table->integer('request_type_id')->unsigned();
            $table->foreign('request_type_id')->references('id')->on('bg_request_type');
            $table->integer('bg_type_id')->unsigned();
            $table->foreign('bg_type_id')->references('id')->on('bg_type_mast');
            $table->string('on_behalf_of',50);
            $table->double('amount',20,2);
            $table->string('request_code',30);
            $table->string('bg_to_amend',30);
            $table->string('on_behalf_name',30);
            $table->string('contract',30);
            $table->text('note');
            $table->text('document');
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
        Schema::dropIfExists('beneficiary_request');
    }
}
