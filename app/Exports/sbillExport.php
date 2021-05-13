<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class sbillExport implements FromCollection, WithHeadings, ShouldAutoSize
{
     use Exportable;
	public $errors;

	public function __construct($errors){
		$this->errors = $errors;
	}
    
    public function collection()
    {
        $errors = $this->errors;
	    return collect($errors);
    }
    public function headings(): array
	{
        return [
              'comp_id',
              //'gstinuin_of_recipient' => $items['gstinuin_of_recipient'],
              'job_id',
              'invoive_number',
              'sales_date',
              'gross_total_invoice_value',
              'invoice_type',
              'e_commerce_gstin',
              'gst_rate',
              'tds_rate',
              'base_amount_taxable_value',
              'gst_amount',
              'description',
              'payment_date',
              'payment_received_amount',
              'tds_amount',
              'five_percrnt_sd_amount',
              'tds_on_gst_2per',
              'lab_cess_1per',
              'hold_for_royalty',
              'deb_late_submission_on_car_151day',
              'mobilize_amount',
              'rent',
              'tds_on_igst_at_2',
              'cc_at_1',
              'other2',
              'other',
              'total_amount',
              'outstanding',
              'bill_desc  ',
              'error_field'

        ];
	}
}



