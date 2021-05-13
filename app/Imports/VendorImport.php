<?php

namespace App\Imports;

use App\vendor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Facades\Excel;

class VendorImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $Collection)
    {

    
    }
}

