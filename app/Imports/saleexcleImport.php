<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Client;
use App\City;
use App\state;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class saleexcleImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $Collection)
    {

    }
}


