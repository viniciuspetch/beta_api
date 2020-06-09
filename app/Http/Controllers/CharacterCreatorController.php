<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CharacterCreatorController extends Controller
{
    public function getAll()
    {
        $results = DB::table('character_creator')
            ->get();
        return response()->json($results);
    }
    public function getSingle($id)
    {
        $result = DB::table("character_creator")
            ->where('id', $id)
            ->first();
        if ($result) {
            $result->character = DB::table('characters')
                ->where('id', $result->character_id)
                ->select('id', 'name')
                ->get();
            $result->creator = DB::table('creators')
                ->where('id', $result->creator_id)
                ->select('id', 'full_name')
                ->get();
            return response()->json($result);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->character_id) && isset($request->creator_id)) {
            DB::table('character_creator')
                ->insert(['character_id' => $request->character_id, 'creator_id' => $request->creator_id, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function delete($id)
    {
        $result = DB::table("character_creator")
            ->where('id', $id);
        if ($result->first()) {
            $result->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
