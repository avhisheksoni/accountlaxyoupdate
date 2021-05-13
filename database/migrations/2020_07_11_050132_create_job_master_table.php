<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_describe',50);
            $table->string('job_code',20);
            $table->string('tender_no',20);
            $table->text('location');
            $table->double('tax_gst');
            $table->double('tax_tds');
            $table->double('sd_percentage');
            $table->string('place_of_supply');
            $table->string('receiver_name');
            $table->string('e_commerece_gstin',20);
            $table->string('other');
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
        Schema::dropIfExists('job_master');
    }
}
