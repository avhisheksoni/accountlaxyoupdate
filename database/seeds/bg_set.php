<?php

use Illuminate\Database\Seeder;

class bg_set extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bg_set_status')->insert([
            'name' => 'Live',
            
        ]);
         DB::table('bg_set_status')->insert([
            'name' => 'Surrendered',
            
        ]);
    }
}
