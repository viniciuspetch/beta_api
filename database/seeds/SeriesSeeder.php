<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert(['name' => "Series 1"]);
        DB::table('series')->insert(['name' => "Series 2"]);
        DB::table('series')->insert(['name' => "Series 3"]);
    }
}
