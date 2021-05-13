<?php

use Illuminate\Database\Seeder;

class ladger extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('ladger')->insert([
            'ladger' => 'manufacture',
            
        ]);
        DB::table('ladger')->insert([
            'ladger' => 'assets',
            
        ]);
        DB::table('ladger')->insert([
            'ladger' => 'communication',
            
        ]);
        DB::table('ladger')->insert([
            'ladger' => 'soft-expenses',
            
        ]);
        DB::table('ladger')->insert([
            'ladger' => 'hard-eexpenses',
            
        ]);
    }
}
