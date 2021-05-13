<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class cjobExport implements FromCollection, WithHeadings, ShouldAutoSize
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
              'Job_work Name',
              'Tender No', 
              'Gst',
              'Tds',
              'Sd Rate',
              'Correspondence Address',
              'State Gstin',
              'Other',
              'Receiver Name',
              'Recevier Cstin',
              'Client',
              'Company',
              'Tender Value',
              'Tender Rate',
              'Work Order No',
              'Work Value',
              'Work Start Date',
              'Work End Date',
              'Error Filed'
        ];
	}
}
