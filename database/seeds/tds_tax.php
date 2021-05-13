<?php

use Illuminate\Database\Seeder;

class tds_tax extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('re_tds_tax')->insert([
            'tds_tax' => '5',
            
        ]);
          DB::table('re_tds_tax')->insert([
            'tds_tax' => '5',
            
        ]);
           DB::table('re_tds_tax')->insert([
            'tds_tax' => '5',
            
        ]);
    }
}
