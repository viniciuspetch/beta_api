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

Route::get('/characters', function (Request $request) {
    $characters = DB::table('characters')->get();
    return response()->json($characters);
});
Route::get('/characters/{id}', function (Request $request, $id) {
    $character = DB::table('characters')->where('id', $id)->first();
    return response()->json($character);
});
//
Route::get('/creators', function (Request $request) {
    $creators = DB::table('creators')->get();
    return response()->json($creators);
});
Route::get('/creators/{id}', function (Request $request, $id) {
    $creators = DB::table('creators')->where('id', $id)->first();
    return response()->json($creators);
});
//
Route::get('/events', function (Request $request) {
    $events = DB::table('events')->get();
    return response()->json($events);
});
Route::get('/events/{id}', function (Request $request, $id) {
    $events = DB::table('events')->where('id', $id)->first();
    return response()->json($events);
});
//
Route::get('/series', function (Request $request) {
    $series = DB::table('series')->get();
    return response()->json($series);
});
Route::get('/series/{id}', function (Request $request, $id) {
    $series = DB::table('series')->where('id', $id)->first();
    return response()->json($series);
});
//
Route::get('/comics', function (Request $request) {
    $comics = DB::table('comics')->get();
    foreach($comics as $comic) {
        $comic->stories = DB::table('stories')->where("stories.comic_id", $comic->id)->get();
    }
    return response()->json($comics);
});
Route::get('/comics/{id}', function (Request $request, $id) {
    $comic = DB::table('comics')->where('id', $id)->first();
    $comic->stories = DB::table('stories')->where("stories.comic_id", $comic->id)->get();
    return response()->json($comic);
});
//
Route::get('/stories', function (Request $request) {
    $stories = DB::table('stories')->get();
    return response()->json($stories);
});
Route::get('/stories/{id}', function (Request $request, $id) {
    $stories = DB::table('stories')->where('id', $id)->first();
    return response()->json($stories);
});