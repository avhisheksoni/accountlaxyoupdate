<?php

use Illuminate\Database\Seeder;

class beneficiary extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('beneficiary')->insert([
            'name' => 'deepak',
            'job_id' => 1,
            
        ]);
        DB::table('beneficiary')->insert([
            'name' => 'vinod',
            'job_id' => 2,
            
        ]);
        DB::table('beneficiary')->insert([
            'name' => 'Ritesh',
            'job_id' => 3,
            
        ]);
        DB::table('beneficiary')->insert([
            'name' => 'Mukesh',
            'job_id' => 4,
            
        ]);
        DB::table('beneficiary')->insert([
            'name' => 'Kishan',
            'job_id' => 5,
            
        ]);
    
    DB::table('beneficiary')->insert([
            'name' => 'Somitra',
            'job_id' => 1,
            
        ]);
    
    DB::table('beneficiary')->insert([
            'name' => 'Prateek',
            'job_id' => 2,
            
        ]);
    
    DB::table('beneficiary')->insert([
            'name' => 'Avhishek',
            'job_id' => 3,
            
        ]);
    
    DB::table('beneficiary')->insert([
            'name' => 'Jitendra',
            'job_id' => 4,
            
        ]);
    

    DB::table('beneficiary')->insert([
            'name' => 'Ankit',
            'job_id' => 5,
            
        ]);
    
    DB::table('beneficiary')->insert([
            'name' => 'Sachin',
            'job_id' => 1,
            
        ]);
    
    DB::table('beneficiary')->insert([
            'name' => 'surendra',
            'job_id' => 2,
            
        ]);
    
}
}
