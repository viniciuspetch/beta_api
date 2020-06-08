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
    $characters = DB::table('characters')->get();
    return response()->json($characters);
});
Route::get('/characters/{id}', function (Request $request, $id) {
    $character = DB::table('characters')->where('id', $id)->first();
    if ($character) {
        return response()->json($character);
    } else {
        return response()->json([], 404);
    }
});
Route::post('/characters', function (Request $request) {
    if (isset($request->name)) {
        DB::table('characters')->insert(["name" => $request->name]);
        return response()->json([], 200);
    } else {
        return response()->json([], 400);
    }
});
Route::put('/characters/{id}', function (Request $request, $id) {
    if (isset($request->name)) {
        DB::table('characters')->where("id", $id)->update(["name" => $request->name]);
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});
Route::delete('/characters/{id}', function (Request $request, $id) {
    $character = DB::table("characters")->where('id', $id);
    if ($character->first()) {
        DB::table('characters')->where('id', $id)->delete();
        return response()->json([], 200);
    } else {
        return response()->json([], 404);
    }
});


// Creators
Route::get('/creators', function (Request $request) {
    $creators = DB::table('creators')->get();
    return response()->json($creators);
});
Route::get('/creators/{id}', function (Request $request, $id) {
    $creators = DB::table('creators')->where('id', $id)->first();
    return response()->json($creators);
});


// Events
Route::get('/events', function (Request $request) {
    $events = DB::table('events')->get();
    return response()->json($events);
});
Route::get('/events/{id}', function (Request $request, $id) {
    $events = DB::table('events')->where('id', $id)->first();
    return response()->json($events);
});


// Series
Route::get('/series', function (Request $request) {
    $series = DB::table('series')->get();
    return response()->json($series);
});
Route::get('/series/{id}', function (Request $request, $id) {
    $series = DB::table('series')->where('id', $id)->first();
    return response()->json($series);
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
