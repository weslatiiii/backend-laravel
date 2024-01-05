<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    //
    public function add(Request $request)
    {
        $data = $request->validate([
            'vpath' => 'required|string',
            'alt' => 'required|string',
            'title' => 'required|string',
            'order' => 'required|integer',
        ]);

        $photo = Photo::create($data);

        return response()->json($photo);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'vpath' => 'string',
            'alt' => 'string',
            'title' => 'string',
            'order' => 'integer',
        ]);

        $photo = Photo::findOrFail($id);
        $photo->update($data);

        return response()->json($photo);
    }

    public function delete($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        return response()->json(['message' => 'Photo deleted successfully']);
    }

    public function getAll()
    {
        $photos = Photo::all();

        return response()->json($photos);
    }

    public function order()
    {
        $photos = Photo::orderBy('order')->get();

        return response()->json($photos);
    }

    public function getById($id)
    {
        $photo = Photo::findOrFail($id);

        return response()->json($photo);
    }
}
