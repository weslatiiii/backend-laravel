<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer ; 

class OrganizersController extends Controller
{
    public function add(Request $request)
    {
        $src = $request->input('src');
        $alt = $request->input('alt');
        $order = $request->input('order');

        // Create a new organizer
        $organizer = Organizer::create([
            'src' => $src,
            'alt' => $alt,
            'order' => $order,
        ]);

        return response()->json($organizer);
    }

    public function update(Request $request, $id)
    {
        $src = $request->input('src');
        $alt = $request->input('alt');
        $order = $request->input('order');

        // Find the organizer by ID
        $organizer = Organizer::find($id);

        // Update the organizer's attributes
        $organizer->update([
            'src' => $src,
            'alt' => $alt,
            'order' => $order,
        ]);

        return response()->json($organizer);
    }

    public function delete($id)
    {
        // Find the organizer by ID and delete it
        $organizer = Organizer::find($id);
        $organizer->delete();

        return response()->json(['message' => 'Organizer deleted successfully']);
    }

    public function order(Request $request)
    {
        
        $organizers = Organizer::orderBy('order')->get();

        return response()->json($organizers);
    }

    public function getByName($name)
    {
        // Implement the logic to get organizers by name
        $organizers = Organizer::where('name', $name)->get();
        return response()->json($organizers);
    }

    public function getById($id)
    {
        // Find the organizer by ID
        $organizer = Organizer::find($id);

        return response()->json($organizer);
    }

    public function getAll()
    {
        // Retrieve all organizers
        $organizers = Organizer::all();

        return response()->json($organizers);
    }
}
