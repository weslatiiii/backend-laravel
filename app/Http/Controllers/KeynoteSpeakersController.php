<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeynoteSpeaker;


class KeynoteSpeakersController extends Controller
{
    //
    public function add(Request $request)
    {
        $data = $request->only(['firstname', 'lastname', 'description', 'website']);
        
        // Create a new keynote speaker
        $speaker = KeynoteSpeaker::create($data);

        return response()->json($speaker);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['firstname', 'lastname', 'description', 'website']);
        
        // Find the keynote speaker by ID
        $speaker = KeynoteSpeaker::find($id);

        // Update the keynote speaker's attributes
        $speaker->update($data);

        return response()->json($speaker);
    }

    public function delete($id)
    {
        // Find the keynote speaker by ID and delete it
        $speaker = KeynoteSpeaker::find($id);
        $speaker->delete();

        return response()->json(['message' => 'Keynote speaker deleted successfully']);
    }

    public function order()
    {
        // Retrieve all keynote speakers, sorted by a specific order
        //$speakers = KeynoteSpeaker::orderBy('order')->get();

        //return response()->json($speakers);
    }

    public function getById($id)
    {
        // Find the keynote speaker by ID
        $speaker = KeynoteSpeaker::find($id);

        return response()->json($speaker);
    }

    public function getAll()
    {
        // Retrieve all keynote speakers
        $speakers = KeynoteSpeaker::all();

        return response()->json($speakers);
    }
}
