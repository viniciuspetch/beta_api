<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function getAll()
    {
        $creators = DB::table('creators')
            ->get();
        foreach ($creators as $creator) {
            $creator->characters = DB::table('character_creator')
                ->where('creator_id', $creator->id)
                ->join('characters', 'character_creator.character_id', '=', 'characters.id')
                ->select(['characters.id as id', 'name'])
                ->get();
        }
        return response()->json($creators);
    }
    public function getSingle($id)
    {
        $creator = DB::table('creators')
            ->where('id', $id)
            ->first();
        if ($creator) {
            $creator->characters = DB::table('character_creator')
                ->where('creator_id', $creator->id)
                ->join('characters', 'character_creator.character_id', '=', 'characters.id')
                ->select(['characters.id as id', 'name'])
                ->get();
            return response()->json($creator);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->first_name) && isset($request->middle_name) && isset($request->last_name) && isset($request->url)) {
            DB::table('creators')
                ->insert(['first_name' => $request->first_name, 'middle_name' => $request->middle_name, 'last_name' => $request->last_name, 'full_name', $request->first_name . " " . $request->middle_name . " " . $request->last_name, 'url' => $request->url, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function put(Request $request, $id)
    {
        if (isset($request->first_name) && isset($request->middle_name) && isset($request->last_name) && isset($request->url)) {
            DB::table('creators')
                ->where("id", $id)
                ->update(['first_name' => $request->first_name, 'middle_name' => $request->middle_name, 'last_name' => $request->last_name, 'full_name', $request->first_name . " " . $request->middle_name . " " . $request->last_name, 'url' => $request->url, 'updated_at' => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
    public function delete($id)
    {
        $creator = DB::table("creators")
            ->where('id', $id);
        if ($creator->first()) {
            $creator->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
