<?php

use Illuminate\Database\Seeder;

class gstin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('gstin')->insert([
            'gstin' => '12AABCS1429B1ZY',
            
        ]);

       DB::table('gstin')->insert([
            'gstin' => '47AABTS1429B1ZY',
            
        ]);

       DB::table('gstin')->insert([
            'gstin' => '47AABCS1587B1ZY',
            
        ]);

       DB::table('gstin')->insert([
            'gstin' => '47PPKCS1429B1ZY',
            
        ]);
    }
}
