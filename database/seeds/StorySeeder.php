<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stories')->insert(['name' => "Story 1", 'comic_id' => 1]);
        DB::table('stories')->insert(['name' => "Story 2", 'comic_id' => 1]);
        DB::table('stories')->insert(['name' => "Story 3", 'comic_id' => 2]);
        DB::table('stories')->insert(['name' => "Story 4", 'comic_id' => 2]);
        DB::table('stories')->insert(['name' => "Story 5", 'comic_id' => 3]);
        DB::table('stories')->insert(['name' => "Story 6", 'comic_id' => 3]);
        DB::table('stories')->insert(['name' => "Story 7", 'comic_id' => 4]);
        DB::table('stories')->insert(['name' => "Story 8", 'comic_id' => 4]);
        DB::table('stories')->insert(['name' => "Story 9", 'comic_id' => 5]);
        DB::table('stories')->insert(['name' => "Story 10", 'comic_id' => 5]);
        DB::table('stories')->insert(['name' => "Story 11", 'comic_id' => 6]);
        DB::table('stories')->insert(['name' => "Story 12", 'comic_id' => 6]);
    }
}
