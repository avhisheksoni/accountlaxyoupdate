<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_desc',50);
            $table->text('address');
            $table->string('state',50);
            $table->string('postal_code',50);
            $table->string('contact1',20);
            $table->string('contact2',20);
            $table->string('email',50);
            $table->string('designation',50);
            $table->string('notes',50);
            $table->string('gstin',50);
            $table->string('pan_number',50);
            $table->string('vat',50);
            $table->string('cust_code',50);
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
        Schema::dropIfExists('customer');
    }
}
