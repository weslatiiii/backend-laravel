<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;

class PagesController extends Controller
{
    public function add(Request $request)
    {
        $name = $request->input('name');

        // Create a new page
        $page = Pages::create(['name' => $name]);

        return response()->json($page);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');

        // Find the page by ID
        $page = Pages::find($id);

        // Update the page's name attribute
        $page->update(['name' => $name]);

        return response()->json($page);
    }

    public function delete($id)
    {
        // Find the page by ID and delete it
        $page = Pages::find($id);
        $page->delete();

        return response()->json(['message' => 'Page deleted successfully']);
    }

    public function getById($id)
    {
        // Find the page by ID
        $page = Pages::find($id);

        return response()->json($page);
    }

    public function getAll()
    {
        // Retrieve all pages
        $pages = Pages::all();

        return response()->json($pages);
    }
}
