<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends Controller
{
    public function getAll()
    {
        $comics = DB::table('comics')
            ->get();
        foreach ($comics as $comic) {
            $comic->stories = DB::table('stories')
                ->where("stories.comic_id", $comic->id)
                ->get();
        }
        return response()->json($comics);
    }
    public function getSingle($id)
    {
        $comic = DB::table('comics')
            ->where('id', $id)
            ->first();
        if ($comic) {
            $comic->stories = DB::table('stories')
                ->where("stories.comic_id", $comic->id)
                ->get();
            return response()->json($comic);
        } else {
            return response()->json([], 404);
        }
    }
    public function getStories($id)
    {
        $comic = DB::table('comics')
            ->where('id', $id)
            ->first();
        if ($comic) {
            $stories = DB::table('stories')
                ->where("stories.comic_id", $id)
                ->get();
            return response()->json($stories);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->name)) {
            DB::table('comics')
                ->insert(["name" => $request->name, 'series_id' => $request->series_id, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function put(Request $request, $id)
    {
        if (isset($request->name) && isset($request->series_id)) {
            DB::table('comics')
                ->where("id", $id)
                ->update(["name" => $request->name, "series_id" => $request->series_id, 'updated_at' => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
    public function delete($id)
    {
        $comic = DB::table("comics")
            ->where('id', $id);
        if ($comic->first()) {
            $comic->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
