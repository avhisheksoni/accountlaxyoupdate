<?php

namespace App\Imports;

use App\Clientjob;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CjobImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $Collection)
    {

        
    }
}
