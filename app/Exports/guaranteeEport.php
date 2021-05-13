<?php

namespace App\Exports;

use App\guranteeexport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class guaranteeEport implements FromCollection, WithHeadings, ShouldAutoSize
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
           'company',
              'beneficiary',
              'tender_no',
              'jobwork_name',
              'issuer_bank',
              'value',
              'bg_date',
              'expiry_date',
              'claim_expiry_date',
              'bank_guarantee_no',
              'status',
              'margrin',
              'margin_amount',
              'bg_commission',
              'bg_commission_amount',
              'bg_type',
              'purpose',
              'error_filed'

        ];
	}
}
