<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Client;
use App\City;
use App\state;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class guaranteeImport implements ToCollection,WithHeadingRow,WithChunkReading
{
    public function collection(Collection $Collection)
    {

    
  
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}


