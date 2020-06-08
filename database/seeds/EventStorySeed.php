<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventStorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_story')->insert(['event_id' => 1, 'story_id' => 1]);
        DB::table('event_story')->insert(['event_id' => 1, 'story_id' => 2]);
        DB::table('event_story')->insert(['event_id' => 1, 'story_id' => 3]);
        DB::table('event_story')->insert(['event_id' => 1, 'story_id' => 4]);
        DB::table('event_story')->insert(['event_id' => 2, 'story_id' => 5]);
        DB::table('event_story')->insert(['event_id' => 2, 'story_id' => 6]);
        DB::table('event_story')->insert(['event_id' => 2, 'story_id' => 7]);
        DB::table('event_story')->insert(['event_id' => 2, 'story_id' => 8]);
        DB::table('event_story')->insert(['event_id' => 3, 'story_id' => 9]);
        DB::table('event_story')->insert(['event_id' => 3, 'story_id' => 10]);
        DB::table('event_story')->insert(['event_id' => 3, 'story_id' => 11]);
        DB::table('event_story')->insert(['event_id' => 3, 'story_id' => 12]);
    }
}
