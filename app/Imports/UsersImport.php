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


class UsersImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $Collection)
    {

        //dd($rows);
        // foreach ($rows as $items) {
            

        //     // dd($items['client']);
        // //    $state = state::where('state_name' ,$items['state'])->first();
        // //    if(!empty($state)){
        // //       $city = City::where('city_name' ,$items['city'])->first();
        // //     if(!empty($city)){;
        // //     $array = array(
        // //       'name' => $items['client'],
        // //       'gstin' => $items['gstin'],
        // //       'email' => $items['email'],
        // //       'pan_no' => $items['pan_no'],
        // //       'state_code' => $state->state_code,
        // //       'city_code' => $city->city_code,
        // //       'correspondence_address' => $items['correspond_address'],
        // //       'Registered_address' => $items['register_address'],
        // //       'note' => $items['note'],
        // //       'contact' => $items['contact'],

        // //     );
        // //        //dd($array);
        // // }     Client::create($array);

        // //Excel::download(new UsersExport, 'users.xlsx');
        // }

 // }      
  
    }
}

