<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundReqestAmountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_reqest_amount', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ledger_id',20);
            $table->string('fund_code',20);
            $table->double('amount',20,2);
            $table->text('note',20);
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
        Schema::dropIfExists('fund_reqest_amount');
    }
}
