<?php

namespace App\Imports;

use App\User;
use App\Companyexcel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CompImport implements ToCollection,WithHeadingRow
{
    
    public function collection(Collection $Collection)
    {
        
    }
}


