<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventStoryController extends Controller
{
    public function getAll()
    {
        $results = DB::table('event_story')
            ->get();
        return response()->json($results);
    }
    public function getSingle($id)
    {
        $result = DB::table("event_story")
            ->where('id', $id)
            ->first();
        if ($result) {
            $result->event = DB::table('events')
                ->where('id', $result->event_id)
                ->select('id', 'name')
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
        if (isset($request->event_id) && isset($request->story_id)) {
            DB::table('event_story')
                ->insert(['event_id' => $request->event_id, 'story_id' => $request->story_id, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function delete($id)
    {
        $result = DB::table("event_story")
            ->where('id', $id);
        if ($result->first()) {
            $result->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
