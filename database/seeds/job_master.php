<?php

use Illuminate\Database\Seeder;

class job_master extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('job_master')->insert([
            'job_describe' => 'dalmia',
            'job_code' => 'Job-JC-1',
            'tender_no' => 'Tnf78666',
            'location' => 'bhavnagar Gujrat',
            'tax_gst' => '10',
            'tax_tds' => '12',
            'sd_percentage' => '5',
            'place_of_supply' => 'Indore MP',
            'receiver_name' => 'Vikram',
            'e_commerece_gstin' => '12AABCS1429B1ZY',
            'other' => '',
            
        ]);

       DB::table('job_master')->insert([
            'job_describe' => 'Karnatak c',
            'job_code' => 'Job-JC-3',
            'tender_no' => 'Tnf78999',
            'location' => 'hussin Karnatak',
            'tax_gst' => '10',
            'tax_tds' => '12',
            'sd_percentage' => '5',
            'place_of_supply' => 'Ratlam MP',
            'receiver_name' => 'Mardul',
            'e_commerece_gstin' => '23PODRS1429B1ZY',
            'other' => '',
            
        ]);
       DB::table('job_master')->insert([
            'job_describe' => 'Tata construct',
            'job_code' => 'Job-JC-2',
            'tender_no' => 'Tnf78777',
            'location' => 'Gandhi ngar Gujrat',
            'tax_gst' => '10',
            'tax_tds' => '12',
            'sd_percentage' => '5',
            'place_of_supply' => 'Bhopal MP',
            'receiver_name' => 'Subham',
            'e_commerece_gstin' => '12AABCS1429B1ZO',
            'other' => '',
            
        ]);
       DB::table('job_master')->insert([
            'job_describe' => 'Haryana Construction',
            'job_code' => 'Job-JC-4',
            'tender_no' => 'Tnf78222',
            'location' => 'gurugram Haryana',
            'tax_gst' => '10',
            'tax_tds' => '12',
            'sd_percentage' => '5',
            'place_of_supply' => 'Sagar MP',
            'receiver_name' => 'Pushpendra',
            'e_commerece_gstin' => '98PKKS1429B1ZY',
            'other' => '',
            
        ]);
    }
}
