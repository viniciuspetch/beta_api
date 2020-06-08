<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('creators')->insert(['name' => "Creator 1"]);
        DB::table('creators')->insert(['name' => "Creator 2"]);
        DB::table('creators')->insert(['name' => "Creator 3"]);
    }
}
