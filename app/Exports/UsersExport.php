<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
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
              'cin_no',
              'tech_head',
              'account_person',
              'billing_person',
              'our_contact_person1',
              'our_contact_person2',
              'our_hr',
              'tech_head_ctect',
              'account_person_ctect',
              'billing_person_ctect',
              'our_contact_person1_ctect',
              'our_contact_person2_ctect',
              'our_hr_ctect',
              'remail',
              'error_filed'

        ];
	}
}
