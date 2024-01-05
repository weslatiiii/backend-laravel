<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    //
    public function add(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'organism' => 'required|string',
            // Add validation rules for other attributes if needed
        ]);

        $author = Author::create($data);

        return response()->json($author);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'firstname' => 'string',
            'lastname' => 'string',
            'organism' => 'string',
            // Add validation rules for other attributes if needed
        ]);

        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->update($data);

        return response()->json($author);
    }

    public function delete($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted successfully']);
    }

    public function getAll()
    {
        $authors = Author::all();

        return response()->json($authors);
    }

    public function getByName($name)
    {
        $authors = Author::where('firstname', 'like', "%$name%")
            ->orWhere('lastname', 'like', "%$name%")
            ->get();

        return response()->json($authors);
    }

    public function getById($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json($author);
    }
}
