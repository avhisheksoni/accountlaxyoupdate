<?php

use Illuminate\Database\Seeder;

class by_request_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bg_request_type')->insert([
            'name' => 'Fresh BG',
           
            
        ]);
        DB::table('bg_request_type')->insert([
            'name' => 'BG Amendment',
          
            
        ]);
    }
}
