<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('reportdate');
            $table->string('title',30);
            $table->integer('job_id');
            $table->string('created_by',30);
            $table->double('amount',20,2);
            $table->string('status',20);
            $table->text('note',20);
            $table->double('cash_on_hand',20);
            $table->double('expense_report_total',20);
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
        Schema::dropIfExists('expense_report');
    }
}
