<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\PurchaseClient;

class VendorExport implements FromQuery,WithMapping,WithHeadings
{
  // use Exportable;
	public $errors;

	// public function __construct($errors){
	// 	$this->errors = $errors;
	// }
    
    public function query()
    {
      return PurchaseClient::with(['statecode','citycode'])->orderBy('name');                
    }

    public function map($purchaseClient): array
    {
     
      return [ $purchaseClient->name,
               $purchaseClient->gstin,
               $purchaseClient->email,
               $purchaseClient->pan_no,
               $purchaseClient->statecode->state_name,
               $purchaseClient->citycode->city_name,
               $purchaseClient->correspondence_address,
               $purchaseClient->Registered_address,
               $purchaseClient->comp_type,
               $purchaseClient->tenure,
               $purchaseClient->tenure_accelration,
               $purchaseClient->cin_no,
               $purchaseClient->our_contact_person1,
               $purchaseClient->our_contact_person1_ctect,
               $purchaseClient->our_contact_person2,
               $purchaseClient->tech_head,
               $purchaseClient->tech_head_ctect,
               $purchaseClient->account_person,
               $purchaseClient->account_person_ctect,
               $purchaseClient->billing_person,
               $purchaseClient->billing_person_ctect,
               $purchaseClient->our_hr,
               $purchaseClient->our_hr_ctect,
           ];
    }

   
    public function headings(): array
	{
        return [
              'Name',
              'GST',
              'Email',
              'PAN No',
              'State Code',
              'City Code',
              'Correspondence Address',
              'Registered Address',
              'Company Type',
              'Tenure',
              'Tenure Accelration',
              'CIN No',
              'Our Contact Person1',
              'Our Contact Person1 Contact',
              'Our Contact Person2',
              'Our Contact Person2 Contact',
              'Technical Head',
              'Technical Head Contact',
              'Account Person',
              'Account Person Contact',
              'Billing Person',
              'Billing Person Contact',
              'Our Hr',
              'Our Hr Contact',
              // 'Remail',
              // 'error_filed'
        ];
	}
}
