<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('purchase_id');
            $table->string('gsstin_uin_of_recipient',100);
            $table->string('receiver_name',50);
            $table->string('invoive_number',50);
            $table->date('purchase_date');
            $table->double('gross_total_invoice_value',50);
            $table->string('place_of_supply',100);
            $table->double('reverse_charge',20,2);
            $table->string('applicable_per_of_tax_rate',20);
            $table->string('invoice_type',50);
            $table->string('e_commerce_gstin',50);
            $table->string('gst_rate',20);
            $table->double('base_amount_taxable_value',20,2);
            $table->string('description',200);
            $table->date('cheque_date');
            $table->double('cheque_send_amount',20,2);
            $table->double('tds',20,2);
            $table->double('other',20,2);
            $table->double('total_amount',20,2);
            $table->double('outstanding',20,2);
            $table->double('mobolization_n_advanced_adjust',20,2);
            $table->double('five_percrnt_sd',20,2);
            $table->double('labour_paymnet',20,2);
            $table->double('Pf_epf',20,2);
            $table->double('group_insurance',20,2);
            $table->double('late_delivery_charges',20,2);
            $table->double('tds_on_igst_at_2_per',20,2);
            $table->double('electricity_charged',20,2);
            $table->double('total_deduction',20,2);
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
        Schema::dropIfExists('purchase');
    }
}
