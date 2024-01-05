<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Links;

class LinksController extends Controller
{
    public function add(Request $request)
    {
        $href = $request->input('href');

        // Create a new link
        $link = Links::create(['href' => $href]);

        return response()->json($link);
    }

    public function update(Request $request, $id)
    {
        $href = $request->input('href');

        // Find the link by ID
        $link = Links::find($id);

        // Update the link's href attribute
        $link->update(['href' => $href]);

        return response()->json($link);
    }

    public function delete($id)
    {
        // Find the link by ID and delete it
        $link = Links::find($id);
        $link->delete();

        return response()->json(['message' => 'Link deleted successfully']);
    }

    public function getById($id)
    {
        // Find the link by ID
        $link = Links::find($id);

        return response()->json($link);
    }

    public function getAll()
    {
        // Retrieve all links
        $links = Links::all();

        return response()->json($links);
    }

}
