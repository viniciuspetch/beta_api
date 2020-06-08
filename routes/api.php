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
    return "/characters//".$id;
});