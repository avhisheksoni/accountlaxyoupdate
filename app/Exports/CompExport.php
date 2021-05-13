<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CompExport implements FromCollection, WithHeadings, ShouldAutoSize
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
                  'name',
                  'gstin',
                  'email',
                  'pan_no',
                  'state_code',
                  'city_code',
                  'correspondence_address',
                  'Registered_address',
                  'note',
                  'comp_type',
                  'tenure',
                  'tenure_accelration',
                  'petty_owner',
                  'petty_owner_contact',
                  'petty_owner_email',
                  'bank_name',
                  'branch_address',
                  'ifsc_code',
                  'account_no',
                  'error_filed',
        ];
	}
}
