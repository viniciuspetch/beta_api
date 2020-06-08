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
    $characters = DB::table('creators')->get();
    return response()->json($characters);
});
Route::get('/creators/{id}', function (Request $request, $id) {
    $character = DB::table('creators')->where('id', $id)->first();
    return response()->json($character);
});
//
Route::get('/events', function (Request $request) {
    $characters = DB::table('events')->get();
    return response()->json($characters);
});
Route::get('/events/{id}', function (Request $request, $id) {
    $character = DB::table('events')->where('id', $id)->first();
    return response()->json($character);
});
//
Route::get('/series', function (Request $request) {
    $characters = DB::table('series')->get();
    return response()->json($characters);
});
Route::get('/series/{id}', function (Request $request, $id) {
    $character = DB::table('series')->where('id', $id)->first();
    return response()->json($character);
});
//
Route::get('/comics', function (Request $request) {
    $characters = DB::table('comics')->get();
    return response()->json($characters);
});
Route::get('/comics/{id}', function (Request $request, $id) {
    $character = DB::table('comics')->where('id', $id)->first();
    return response()->json($character);
});
//
Route::get('/stories', function (Request $request) {
    $characters = DB::table('stories')->get();
    return response()->json($characters);
});
Route::get('/stories/{id}', function (Request $request, $id) {
    $character = DB::table('stories')->where('id', $id)->first();
    return response()->json($character);
});