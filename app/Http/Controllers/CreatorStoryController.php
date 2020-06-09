<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreatorStoryController extends Controller
{
    public function getAll()
    {
        $results = DB::table('creator_story')
            ->get();
        return response()->json($results);
    }
    public function getSingle($id)
    {
        $result = DB::table("creator_story")
            ->where('id', $id)
            ->first();
        if ($result) {
            $result->creator = DB::table('creators')
                ->where('id', $result->creator_id)
                ->select('id', 'full_name')
                ->get();
            $result->story = DB::table('stories')
                ->where('id', $result->story_id)
                ->select('id', 'name')
                ->get();
            return response()->json($result);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->creator_id) && isset($request->story_id)) {
            DB::table('creator_story')
                ->insert(['creator_id' => $request->creator_id, 'story_id' => $request->story_id, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function delete($id)
    {
        $result = DB::table("creator_story")
            ->where('id', $id);
        if ($result->first()) {
            $result->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
