<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VendorErrExport implements FromCollection, WithHeadings, ShouldAutoSize
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
           'Vendor type',
              'Firm type',
              'Email',
              'Mobile',
              'State',
              'District',
              'address',
              //'city',
              'Postal Code',
              'Name',
              'Phone',
              'Pan No',
              'Aadhar No',
              'Gstin',
              'Reference Name',
              'Firm Name',
              'Vendor_type_imp',
              'Firm type',
              'Bank',
              'Bank branch',
              'Account No.',
              'IFSC Code',
              'error_filed',

        ];
	}
}

