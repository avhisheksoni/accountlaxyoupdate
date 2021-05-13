<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('sale_id');
            $table->integer('job_id');
            $table->foreign('job_id')->references('id')->on('job_master');
            $table->string('invoive_number',50);
            $table->date('sales_date');
            $table->double('gross_total_invoice_value',50);
            $table->string('invoice_type',50);
            $table->double('base_amount_taxable_value',20,2);
            $table->string('description',200);
            $table->date('cheque_date');
            $table->double('cheque_received_amount',20,2);
            $table->double('tds_amount',20,2);
            $table->double('gst_amount',20,2);
            $table->double('other',20,2);
            $table->double('total_amount',20,2);
            $table->double('outstanding',20,2);
            $table->double('five_percrnt_sd_amount',20,2);
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
