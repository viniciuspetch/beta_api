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

Route::get('/', function () {
    return view('api');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::get('users', 'AuthController@users');
    });
});


// Characters
Route::get('/characters', 'CharacterController@getAll');
Route::get('/characters/{id}', 'CharacterController@getSingle');
Route::get('/characters/{id}/creators', 'CharacterController@getCreators');
Route::get('/characters/{id}/stories', 'CharacterController@getStories');
Route::get('/characters/{id}/comics', 'CharacterController@getComics');
Route::get('/characters/{id}/series', 'CharacterController@getSeries');
Route::get('/characters/{id}/events', 'CharacterController@getEvents');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/characters', 'CharacterController@post');
    Route::put('/characters/{id}', 'CharacterController@put');
    Route::delete('/characters/{id}', 'CharacterController@delete');
});


// Creators
Route::get('/creators', 'CreatorController@getAll');
Route::get('/creators/{id}', 'CreatorController@getSingle');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/creators', 'CreatorController@post');
    Route::put('/creators/{id}', 'CreatorController@put');
    Route::delete('/creators/{id}', 'CreatorController@delete');
});


// Events
Route::get('/events', 'EventController@getAll');
Route::get('/events/{id}', 'EventController@getSingle');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/events', 'EventController@post');
    Route::put('/events/{id}', 'EventController@put');
    Route::delete('/events/{id}', 'EventController@delete');
});


// Series
Route::get('/series', 'SeriesController@getAll');
Route::get('/series/{id}', 'SeriesController@getSingle');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/series', 'SeriesController@post');
    Route::put('/series/{id}', 'SeriesController@put');
    Route::delete('/series/{id}', 'SeriesController@delete');
});


// Comics
Route::get('/comics', 'ComicController@getAll');
Route::get('/comics/{id}', 'ComicController@getSingle');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/comics/{id}/stories', 'ComicController@getStories');
    Route::post('/comics', 'ComicController@post');
    Route::put('/comics/{id}', 'ComicController@put');
    Route::delete('/comics/{id}', 'ComicController@delete');
});


// Stories
Route::get('/stories', 'StoryController@getAll');
Route::get('/stories/{id}', 'StoryController@getSingle');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/stories', 'StoryController@post');
    Route::put('/stories/{id}', 'StoryController@put');
    Route::delete('/stories/{id}', 'StoryController@delete');
});

Route::get('/character_creator', 'CharacterCreatorController@getAll');
Route::get('/character_creator/{id}', 'CharacterCreatorController@getSingle');
Route::post('/character_creator', 'CharacterCreatorController@post');
Route::delete('/character_creator/{id}', 'CharacterCreatorController@delete');

Route::get('/character_story', 'CharacterStoryController@getAll');
Route::get('/character_story/{id}', 'CharacterStoryController@getSingle');
Route::post('/character_story', 'CharacterStoryController@post');
Route::delete('/character_story/{id}', 'CharacterStoryController@delete');

Route::get('/creator_story', 'CreatorStoryController@getAll');
Route::get('/creator_story/{id}', 'CreatorStoryController@getSingle');
Route::post('/creator_story', 'CreatorStoryController@post');
Route::delete('/creator_story/{id}', 'CreatorStoryController@delete');

Route::get('/event_story', 'EventStoryController@getAll');
Route::get('/event_story/{id}', 'EventStoryController@getSingle');
Route::post('/event_story', 'EventStoryController@post');
Route::delete('/event_story/{id}', 'EventStoryController@delete');
