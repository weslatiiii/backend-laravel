<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    //
    public function add(Request $request)
    {
        $data = $request->validate([
            'vpath' => 'required|string',
            'title' => 'required|string',
            'order' => 'required|integer',
        ]);

        $video = Video::create($data);

        return response()->json($video);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'vpath' => 'string',
            'title' => 'string',
            'order' => 'integer',
        ]);

        $video = Video::findOrFail($id);
        $video->update($data);

        return response()->json($video);
    }

    public function delete($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return response()->json(['message' => 'Video deleted successfully']);
    }

    public function getAll()
    {
        $videos = Video::all();

        return response()->json($videos);
    }

    public function order()
    {
        $videos = Video::orderBy('order')->get();

        return response()->json($videos);
    }

    public function getById($id)
    {
        $video = Video::findOrFail($id);

        return response()->json($video);
    }
}
