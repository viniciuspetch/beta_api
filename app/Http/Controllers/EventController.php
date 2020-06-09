<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function getAll()
    {
        $events = DB::table('events')
            ->get();
        return response()->json($events);
    }
    public function getSingle($id)
    {
        $event = DB::table('events')
            ->where('id', $id)
            ->first();
        if ($event) {
            return response()->json($event);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->name)) {
            DB::table('events')
                ->insert(["name" => $request->name, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function put(Request $request, $id)
    {
        if (isset($request->name)) {
            DB::table('events')
                ->where("id", $id)
                ->update(["name" => $request->name, 'updated_at' => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
    public function delete($id)
    {
        $event = DB::table("events")
            ->where('id', $id);
        if ($event->first()) {
            $event->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
