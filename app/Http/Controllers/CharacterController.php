<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    public function getAll()
    {
        $characters = DB::table('characters')
            ->get();
        foreach ($characters as $character) {
            $character->creators = DB::table("character_creator")
                ->where('character_id', $character->id)
                ->join('creators', 'character_creator.creator_id', '=', 'creators.id')
                ->select(['creators.id as id', 'name'])
                ->get();
            $character->stories = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->select(['stories.id as id', 'name'])
                ->get();
            $character->comics = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('comics', 'stories.comic_id', '=', 'comics.id')
                ->select(['comics.id as id', 'comics.name as name'])
                ->groupBy('comics.id')
                ->get();
            $character->series = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('comics', 'stories.comic_id', '=', 'comics.id')
                ->join('series', 'comics.series_id', '=', 'series.id')
                ->select(['series.id as id', 'series.name as name'])
                ->groupBy('series.id')
                ->get();
            $character->events = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('event_story', 'stories.id', '=', 'event_story.story_id')
                ->join('events', 'event_story.event_id', '=', 'events.id')
                ->select(['events.id as id', 'events.name as name'])
                ->groupBy('events.id')
                ->get();
        }
        return response()->json($characters);
    }

    public function getSingle($id)
    {
        $character = DB::table('characters')
            ->where('id', $id)
            ->first();
        if ($character) {
            $character->creators = DB::table("character_creator")
                ->where('character_id', $character->id)
                ->join('creators', 'character_creator.creator_id', '=', 'creators.id')
                ->select(['creators.id as id', 'name'])
                ->get();
            $character->stories = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->select(['stories.id as id', 'name'])
                ->get();
            $character->comics = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('comics', 'stories.comic_id', '=', 'comics.id')
                ->select(['comics.id as id', 'comics.name as name'])
                ->groupBy('comics.id')
                ->get();
            $character->series = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('comics', 'stories.comic_id', '=', 'comics.id')
                ->join('series', 'comics.series_id', '=', 'series.id')
                ->select(['series.id as id', 'series.name as name'])
                ->groupBy('series.id')
                ->get();
            $character->events = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('event_story', 'stories.id', '=', 'event_story.story_id')
                ->join('events', 'event_story.event_id', '=', 'events.id')
                ->select(['events.id as id', 'events.name as name'])
                ->groupBy('events.id')
                ->get();
            return response()->json($character);
        } else {
            return response()->json([], 404);
        }
    }

    public function getCreators($id)
    {
        $character = DB::table('characters')
            ->where('id', $id)
            ->first();
        if ($character) {
            $creators = DB::table("character_creator")
                ->where('character_id', $character->id)
                ->join('creators', 'character_creator.creator_id', '=', 'creators.id')
                ->select(['creators.id as id', 'creators.name', 'creators.created_at', 'creators.updated_at'])
                ->get();
            return response()->json($creators);
        } else {
            return response()->json([], 404);
        }
    }

    public function getStories($id)
    {
        $character = DB::table('characters')
            ->where('id', $id)
            ->first();
        if ($character) {
            $stories = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->select(['stories.id as id', 'stories.name as name', 'stories.created_at as created_at', 'stories.updated_at as updated_at'])
                ->get();
            return response()->json($stories);
        } else {
            return response()->json([], 404);
        }
    }

    public function getComics($id)
    {
        $character = DB::table('characters')
            ->where('id', $id)
            ->first();
        if ($character) {
            $comics = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('comics', 'stories.comic_id', '=', 'comics.id')
                ->select(['comics.id as id', 'comics.name as name', 'comics.created_at as created_at', 'comics.updated_at as updated_at'])
                ->groupBy('comics.id')
                ->get();
            return response()->json($comics);
        } else {
            return response()->json([], 404);
        }
    }

    public function getSeries($id)
    {
        $character = DB::table('characters')
            ->where('id', $id)
            ->first();
        if ($character) {
            $series = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('comics', 'stories.comic_id', '=', 'comics.id')
                ->join('series', 'comics.series_id', '=', 'series.id')
                ->select(['series.id as id', 'series.name as name', 'series.created_at as created_at', 'series.updated_at as updated_at'])
                ->groupBy('series.id')
                ->get();
            return response()->json($series);
        } else {
            return response()->json([], 404);
        }
    }

    public function getEvents($id)
    {
        $character = DB::table('characters')
            ->where('id', $id)
            ->first();
        if ($character) {
            $events = DB::table("character_story")
                ->where('character_id', $character->id)
                ->join('stories', 'character_story.story_id', '=', 'stories.id')
                ->join('event_story', 'stories.id', '=', 'event_story.story_id')
                ->join('events', 'event_story.event_id', '=', 'events.id')
                ->select(['events.id as id', 'events.name as name', 'events.created_at as created_at', 'events.updated_at as updated_at'])
                ->groupBy('events.id')
                ->get();
            return response()->json($events);
        } else {
            return response()->json([], 404);
        }
    }

    public function post(Request $request)
    {
        if (isset($request->name)) {
            DB::table('characters')
                ->insert(["name" => $request->name, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }

    public function put(Request $request, $id)
    {
        if (isset($request->name)) {
            DB::table('characters')
                ->where("id", $id)
                ->update(["name" => $request->name, 'updated_at' => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }

    public function delete($id)
    {
        $character = DB::table("characters")
            ->where('id', $id);
        if ($character->first()) {
            $character->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
