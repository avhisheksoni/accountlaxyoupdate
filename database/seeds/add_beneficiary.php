<?php

use Illuminate\Database\Seeder;

class add_beneficiary extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('beneficiary_add')->insert([
            'company_name' => 'tata soft',
            'contact' => '9865744152',
            'email' => 'tata@gmail.com',
            'gstin_no' => '35AABCS1429B1ZX',
            'pan_no' => 'ABCDE1234F',
            'city_code' => 13,
            'state_code' => 15,
            'correspondance_address' => 'sector-A123 Ratlam',
            'registered_address' => 'BL-123 Vijay Nagar Indore',
            'note' => 'Beneficiary customer',
            
        ]);

       DB::table('beneficiary_add')->insert([
            'company_name' => 'Mahindra finance',
            'contact' => '7485968574',
            'email' => 'finanaceta@gmail.com',
            'gstin_no' => '47AABCS1429B1ZY',
            'pan_no' => 'EDCBA4325T',
            'city_code' => 15,
            'state_code' => 13,
            'correspondance_address' => 'sector-A123 Ahemdabad',
            'registered_address' => 'BL-123 Vijay Nagar Ahemdabad',
            'note' => 'Beneficiary customer',
            
        ]);
    }
}
