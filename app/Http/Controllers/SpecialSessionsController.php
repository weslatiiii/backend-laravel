<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialSessions;


class SpecialSessionsController extends Controller
{
    //
    public function add(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        $specialSession = SpecialSessions::create($data);

        return response()->json($specialSession);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'order' => 'integer',
        ]);

        $specialSession = SpecialSessions::find($id);

        if (!$specialSession) {
            return response()->json(['message' => 'Special session not found'], 404);
        }

        $specialSession->update($data);

        return response()->json($specialSession);
    }

    public function delete($id)
    {
        $specialSession = SpecialSessions::find($id);

        if (!$specialSession) {
            return response()->json(['message' => 'Special session not found'], 404);
        }

        $specialSession->delete();

        return response()->json(['message' => 'Special session deleted successfully']);
    }

    public function order()
    {
        $specialSessions = SpecialSessions::orderBy('order')->get();

        return response()->json($specialSessions);
    }

    public function getByName(Request $request)
    {
        $title = $request->input('title');

        $specialSession = SpecialSessions::where('title', $title)->first();

        if (!$specialSession) {
            return response()->json(['message' => 'Special session not found'], 404);
        }

        return response()->json($specialSession);
    }

    public function getAll()
    {
        $specialSessions = SpecialSessions::all();

        return response()->json($specialSessions);
    }
}
