<?php

use Illuminate\Database\Seeder;

class bg_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('bg_type_')->insert([
            'name' => 'deepak',
            'job_id' => 1,
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'vinod',
            'job_id' => 2,
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Ritesh',
            'job_id' => 3,
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Mukesh',
            'job_id' => 4,
            
        ]);
        DB::table('bg_type_mast')->insert([
            'name' => 'Kishan',
            'job_id' => 5,
            
        ]);
    
    DB::table('bg_type_mast')->insert([
            'name' => 'Somitra',
            'job_id' => 1,
            
        ]);
    
    DB::table('bg_type_mast')->insert([
            'name' => 'Prateek',
            'job_id' => 2,
            
        ]);
    
    DB::table('bg_type_mast')->insert([
            'name' => 'Avhishek',
            'job_id' => 3,
            
        ]);
    
    DB::table('bg_type_mast')->insert([
            'name' => 'Jitendra',
            'job_id' => 4,
            
        ]);
    

    DB::table('bg_type_mast')->insert([
            'name' => 'Ankit',
            'job_id' => 5,
            
        ]);
    
    DB::table('bg_type_mast')->insert([
            'name' => 'Sachin',
            'job_id' => 1,
            
        ]);
    
    DB::table('bg_type_mast')->insert([
            'name' => 'surendra',
            'job_id' => 2,
            
        ]);
    
}
}
