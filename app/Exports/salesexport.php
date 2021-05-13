<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class salesexport implements FromCollection, WithHeadings, ShouldAutoSize
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
              'Job Code',
              'Invoice No.',
              'Invoice Date',
              'Description/Particular',
              'Base Amount Taxable Value',
              'GST',
              'GST Amount',
              'GST Hold(if any)',
              'Gross Invoice Value',
              'Payment Receipt Date',
              'Amount To be Received',
              'Actual Paymnet Received',
              'TDS% (1 or 2 or 5 or 10 %)',
              'TDS Deduction Amount',
              'Mobilization Deduction Amount',
              'SD Amount (%)',
              'Retention Money',
              'Other Deduction 1',
              'Total Deduction Amount',
              'Current OutStanding',
              'Total Order Value',
              'Balance To be Billed',

        ];
	}
}


