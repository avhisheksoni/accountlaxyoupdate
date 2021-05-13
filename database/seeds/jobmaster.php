<?php

use Illuminate\Database\Seeder;

class jobmaster extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_master')->insert([
            'job_describe' => 'developer',
            
        ]);
        DB::table('job_master')->insert([
            'job_describe' => 'civil',
            
        ]);
        DB::table('job_master')->insert([
            'job_describe' => 'gps',
            
        ]);
        DB::table('job_master')->insert([
            'job_describe' => 'hr',
            
        ]);
        DB::table('job_master')->insert([
            'job_describe' => 'account',
            
        ]);
    }
}
