<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterCreatorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('character_creator')->insert(['character_id' => 1, 'creator_id' => 1]);
        DB::table('character_creator')->insert(['character_id' => 1, 'creator_id' => 2]);
        DB::table('character_creator')->insert(['character_id' => 2, 'creator_id' => 2]);
        DB::table('character_creator')->insert(['character_id' => 2, 'creator_id' => 3]);
        DB::table('character_creator')->insert(['character_id' => 3, 'creator_id' => 3]);
        DB::table('character_creator')->insert(['character_id' => 3, 'creator_id' => 1]);        
    }
}
