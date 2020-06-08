<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Characters
Route::get('/characters', function (Request $request) {
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
});
Route::get('/characters/{id}', function (Request $request, $id) {
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
});
Route::get('/characters/{id}/creators', function ($id) {
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
});
Route::get('/characters/{id}/stories', function ($id) {
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
});
Route::get('/characters/{id}/comics', function ($id) {
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
});
Route::get('/characters/{id}/series', function ($id) {
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
});
Route::get('/characters/{id}/events', function ($id) {
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
});
Route::post('/characters', function (Request $request) {
    if (isset($request->name)) {
        DB::table('characters')->insert(["name" => $request->name, "created_at" => now(), "updated_at" => now()]);
        return response()->json([], 200);
    } else {
        return response()->json([], 400);
    }
});
Route::put('/characters/{id}', function (Request $request, $id) {
    if (isset($request->name)) {
        DB::table('characters')->where("id", $id)->update(["name" => $request->name, 'updated_at' => now()]);
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});
Route::delete('/characters/{id}', function (Request $request, $id) {
    $character = DB::table("characters")->where('id', $id);
    if ($character->first()) {
        $character->delete();
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});


// Creators
Route::get('/creators', function (Request $request) {
    $creators = DB::table('creators')
        ->get();
    foreach ($creators as $creator) {
        $creator->characters = DB::table('character_creator')
            ->where('creator_id', $creator->id)
            ->join('characters', 'character_creator.character_id', '=', 'characters.id')
            ->select(['characters.id as id', 'name'])
            ->get();
    }
    return response()->json($creators);
});
Route::get('/creators/{id}', function (Request $request, $id) {
    $creator = DB::table('creators')
        ->where('id', $id)
        ->first();
    if ($creator) {
        $creator->characters = DB::table('character_creator')
            ->where('creator_id', $creator->id)
            ->join('characters', 'character_creator.character_id', '=', 'characters.id')
            ->select(['characters.id as id', 'name'])
            ->get();
        return response()->json($creator);
    } else {
        return response()->json([], 404);
    }
});
Route::post('/creators', function (Request $request) {
    if (isset($request->name)) {
        DB::table('creators')
            ->insert(["name" => $request->name, "created_at" => now(), "updated_at" => now()]);
        return response()->json([], 200);
    } else {
        return response()->json([], 400);
    }
});
Route::put('/creators/{id}', function (Request $request, $id) {
    if (isset($request->name)) {
        DB::table('creators')
            ->where("id", $id)
            ->update(["name" => $request->name, 'updated_at' => now()]);
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});
Route::delete('/creators/{id}', function (Request $request, $id) {
    $creator = DB::table("creators")
        ->where('id', $id);
    if ($creator->first()) {
        $creator->delete();
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});


// Events
Route::get('/events', function (Request $request) {
    $events = DB::table('events')
        ->get();
    return response()->json($events);
});
Route::get('/events/{id}', function ($id) {
    $event = DB::table('events')
        ->where('id', $id)
        ->first();
    if ($event) {
        return response()->json($event);
    } else {
        return response()->json([], 404);
    }
});
Route::post('/events', function (Request $request) {
    if (isset($request->name)) {
        DB::table('events')
            ->insert(["name" => $request->name, "created_at" => now(), "updated_at" => now()]);
        return response()->json([], 200);
    } else {
        return response()->json([], 400);
    }
});
Route::put('/events/{id}', function (Request $request, $id) {
    if (isset($request->name)) {
        DB::table('events')
            ->where("id", $id)
            ->update(["name" => $request->name, 'updated_at' => now()]);
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});
Route::delete('/events/{id}', function ($id) {
    $event = DB::table("events")
        ->where('id', $id);
    if ($event->first()) {
        $event->delete();
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});


// Series
Route::get('/series', function (Request $request) {
    $series = DB::table('series')->get();
    foreach ($series as $sr) {
        $sr->comics = DB::table("comics")->where("comics.series_id", $sr->id)->get();
    }
    return response()->json($series);
});
Route::get('/series/{id}', function (Request $request, $id) {
    $series = DB::table('series')->where('id', $id)->first();
    if ($series) {
        $series->comics = DB::table("comics")->where("comics.series_id", $id)->get();
        return response()->json($series);
    } else {
        return response()->json([], 404);
    }
});


// Comics
Route::get('/comics', function (Request $request) {
    $comics = DB::table('comics')->get();
    foreach ($comics as $comic) {
        $comic->stories = DB::table('stories')->where("stories.comic_id", $comic->id)->get();
    }
    return response()->json($comics);
});
Route::get('/comics/{id}', function (Request $request, $id) {
    $comic = DB::table('comics')->where('id', $id)->first();
    $comic->stories = DB::table('stories')->where("stories.comic_id", $comic->id)->get();
    return response()->json($comic);
});
Route::get('/comics/{id}/stories', function (Request $request, $id) {
    $stories = DB::table('stories')->where("stories.comic_id", $id)->get();
    return response()->json($stories);
});


// Stories
Route::get('/stories', function (Request $request) {
    $stories = DB::table('stories')->get();
    return response()->json($stories);
});
Route::get('/stories/{id}', function (Request $request, $id) {
    $stories = DB::table('stories')->where('id', $id)->first();
    return response()->json($stories);
});
