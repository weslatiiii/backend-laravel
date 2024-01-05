<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsController extends Controller
{
    public function add(Request $request)
    {
        $link = $request->input('link');
        $text = $request->input('text');
        $datetweet = $request->input('datetweet');

        // Create a new tweet
        $tweet = Tweet::create([
            'link' => $link,
            'text' => $text,
            'datetweet' => $datetweet,
        ]);

        return response()->json($tweet);
    }

    public function update(Request $request, $id)
    {
        $link = $request->input('link');
        $text = $request->input('text');
        $datetweet = $request->input('datetweet');

        // Find the tweet by ID
        $tweet = Tweet::find($id);

        // Update the tweet's attributes
        $tweet->update([
            'link' => $link,
            'text' => $text,
            'datetweet' => $datetweet,
        ]);

        return response()->json($tweet);
    }

    public function delete($id)
    {
        // Find the tweet by ID and delete it
        $tweet = Tweet::find($id);
        $tweet->delete();

        return response()->json(['message' => 'Tweet deleted successfully']);
    }

    public function getById($id)
    {
        // Find the tweet by ID
        $tweet = Tweet::find($id);

        return response()->json($tweet);
    }

    public function getAll()
    {
        // Retrieve all tweets
        $tweets = Tweet::all();

        return response()->json($tweets);
    }

    public function disactivate($id)
    {
        // Find the tweet by ID and update its status (disactivate)
        $tweet = Tweet::find($id);
        $tweet->update(['active' => false]);

        return response()->json(['message' => 'Tweet disactivated successfully']);
    }
}
