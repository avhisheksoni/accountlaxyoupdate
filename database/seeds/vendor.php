<?php

use Illuminate\Database\Seeder;

class vendor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
       DB::table('vendor')->insert([
            'name' => 'tata- infra',
            'contact' => '9926658978',
            'address' => 'Mumbai',
        
            
        ]);
        DB::table('vendor')->insert([
           'name' => 'Wipro soft',
            'contact' => '9685745241',
            'address' => 'Pune',
            
        ]);
        DB::table('vendor')->insert([
           'name' => 'Relince',
            'contact' => '8574857452',
            'address' => 'Delhi',
            
        ]);
        DB::table('vendor')->insert([
            'name' => 'Lg',
            'contact' => '9685744152',
            'address' => 'banglore',
            
        ]);
        DB::table('vendor')->insert([
           'name' => 'philips',
            'contact' => '652415874',
            'address' => 'indore',
            
        ]);
    }
}
