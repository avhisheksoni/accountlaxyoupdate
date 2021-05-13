<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PjobExport implements FromCollection, WithHeadings, ShouldAutoSize
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
              'Job Work Name',
              'Tender no',
              'Gst',
              'Tds',
              'Sd',
              'Location',
              'Petty Contractor',
              'Petty Contractor Gstin',
              'Other',
              'Client Name',
              'our Company',
              'State gstin',
              'Tender Value',
              'Tender Rate',
              'Work Order No.',
              'Work Value',
              'Work Start Date',
              'Work End Date',
              'error_filed'
        ];
	}
}
