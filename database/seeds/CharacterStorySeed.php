<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterStorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('character_story')->insert(['character_id' => 1, 'story_id' => 1]);
        DB::table('character_story')->insert(['character_id' => 1, 'story_id' => 2]);
        DB::table('character_story')->insert(['character_id' => 2, 'story_id' => 2]);
        DB::table('character_story')->insert(['character_id' => 2, 'story_id' => 3]);
        DB::table('character_story')->insert(['character_id' => 3, 'story_id' => 3]);
        DB::table('character_story')->insert(['character_id' => 3, 'story_id' => 1]);
    }
}
