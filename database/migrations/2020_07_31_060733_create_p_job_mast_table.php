<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePJobMastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_job_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
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
            $table->integer('client_id');
            $table->integer('comp_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_job_mast');
    }
}
