<?php

namespace App\Imports;

use App\PJobExcel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PJobImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $Collection)
    {

        
    }
}
