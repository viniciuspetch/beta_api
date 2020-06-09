<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    public function getAll()
    {
        $stories = DB::table('stories')
            ->get();
        return response()->json($stories);
    }
    public function getSingle($id)
    {
        $stories = DB::table('stories')
            ->where('id', $id)
            ->first();
        if ($stories) {
            return response()->json($stories);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->name)) {
            DB::table('stories')
                ->insert(["name" => $request->name, 'comic_id' => $request->comic_id, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function put(Request $request, $id)
    {
        if (isset($request->name) && isset($request->comic_id)) {
            DB::table('stories')
                ->where("id", $id)
                ->update(["name" => $request->name, 'comic_id' => $request->comic_id, 'updated_at' => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
    public function delete($id)
    {
        $story = DB::table("stories")
            ->where('id', $id);
        if ($story->first()) {
            $story->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
