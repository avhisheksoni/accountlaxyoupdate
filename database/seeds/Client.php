<?php

use Illuminate\Database\Seeder;

class Client extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('re_client')->insert([
            'name' => 'DALMIA DSP (UNIT I)',
            'gstin' => '21AADCA9414C4Z8',
            
        ]);
       DB::table('re_client')->insert([
            'name' => 'TATA (UNIT I)',
            'gstin' => '95SSDCA9414C3W6',
            
        ]);
    }
}
