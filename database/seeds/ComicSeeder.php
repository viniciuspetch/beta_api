<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comics')->insert(['name' => "Comic 1", 'series_id' => 1]);
        DB::table('comics')->insert(['name' => "Comic 2", 'series_id' => 1]);
        DB::table('comics')->insert(['name' => "Comic 3", 'series_id' => 2]);
        DB::table('comics')->insert(['name' => "Comic 4", 'series_id' => 2]);
        DB::table('comics')->insert(['name' => "Comic 5", 'series_id' => 3]);
        DB::table('comics')->insert(['name' => "Comic 6", 'series_id' => 3]);
    }
}
