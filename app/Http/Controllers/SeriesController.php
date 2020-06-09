<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function getAll()
    {
        $series = DB::table('series')
            ->get();
        foreach ($series as $sr) {
            $sr->comics = DB::table("comics")
                ->where("comics.series_id", $sr->id)
                ->get();
        }
        return response()->json($series);
    }
    public function getSingle($id)
    {
        $series = DB::table('series')
            ->where('id', $id)
            ->first();
        if ($series) {
            $series->comics = DB::table("comics")
                ->where("comics.series_id", $id)
                ->get();
            return response()->json($series);
        } else {
            return response()->json([], 404);
        }
    }
    public function post(Request $request)
    {
        if (isset($request->name)) {
            DB::table('series')
                ->insert(["name" => $request->name, "created_at" => now(), "updated_at" => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 400);
        }
    }
    public function put(Request $request, $id)
    {
        if (isset($request->name)) {
            DB::table('series')
                ->where("id", $id)
                ->update(["name" => $request->name, 'updated_at' => now()]);
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
    public function delete($id)
    {
        $series = DB::table("series")
            ->where('id', $id);
        if ($series->first()) {
            $series->delete();
            return response()->json([], 200);
        } else {
            return response()->json([], 404);
        }
    }
}
