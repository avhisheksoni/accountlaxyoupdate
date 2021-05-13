<?php

use Illuminate\Database\Seeder;

class bg_type_ extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bg_type_mast')->insert([
            'name' => 'Warranty',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Letter of Intent',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Payment Guarantee',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Credit Security Bond',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Confirmed Payment  Order  BG',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'EMD',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Security Deposit',
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Retention Money',
            
        ]);

       DB::table('bg_type_mast')->insert([
            'name' => 'Material Supply',
            
        ]);


    }
}
