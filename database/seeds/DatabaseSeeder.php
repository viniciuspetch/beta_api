<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CharacterSeeder::class,
            CreatorSeeder::class,
            EventSeeder::class,
            SeriesSeeder::class,
            ComicSeeder::class,
            StorySeeder::class,
            CharacterCreatorSeed::class,
            CharacterStorySeed::class,
            CreatorStorySeed::class,
            EventStorySeed::class,
        ]);
    }
}
