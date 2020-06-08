<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert(['name' => "Character 1"]);
        DB::table('characters')->insert(['name' => "Character 2"]);
        DB::table('characters')->insert(['name' => "Character 3"]);
    }
}
