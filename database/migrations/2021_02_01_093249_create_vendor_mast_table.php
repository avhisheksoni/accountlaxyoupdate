<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorMastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vendor_type');
            $table->integer('firm_type');
            $table->string('firm_name',50);
            $table->string('email',50);
            $table->string('mobile',12);
            $table->text('address');
            $table->string('city',50);
            $table->string('postal_code',50);
            $table->integer('state_code');
            $table->integer('city_code');
            $table->string('name',50);
            $table->string('phone',50);
            $table->string('fax',50);
            $table->string('website',50);
            $table->string('pan_no',10);
            $table->string('aadhar_no',12);
            $table->string('gst_number',15);
            $table->string('annual_turnover',30);
            $table->string('reference_name1',15);
            $table->string('reference_name2',15);
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
        Schema::dropIfExists('vendor_mast');
    }
}
