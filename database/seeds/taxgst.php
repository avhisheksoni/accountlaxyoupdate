<?php

use Illuminate\Database\Seeder;

class taxgst extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('re_tax_gst')->insert([
            'tax_gst' => '5',
            
        ]);

        DB::table('re_tax_gst')->insert([
            'tax_gst' => '10',
            
        ]);
        DB::table('re_tax_gst')->insert([
            'tax_gst' => '12',
            
        ]);
    }
}
