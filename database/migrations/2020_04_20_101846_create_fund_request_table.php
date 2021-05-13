<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request_code',50);
            $table->string('job',50);
            $table->string('request_by',50);
            $table->string('request_on',50);
            $table->text('note');
            $table->string('month_year',15);
            // $table->string('year',10);
            $table->string('status',15);
            $table->double('amount',20,2);
            $table->double('fund_reqest_amount',20,2);
            $table->text('file');
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
        Schema::dropIfExists('fund_request');
    }
}
