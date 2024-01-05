<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorsController extends Controller
{
    public function add(Request $request)
    {
        // Implement the logic for adding a sponsor
        $src = $request->input('src');
        $alt = $request->input('alt');
        $order = $request->input('order');

        $sponsor = Sponsor::create(['src' => $src, 'alt' => $alt, 'order' => $order]);

        return response()->json($sponsor);
    }

    public function update(Request $request, $id)
    {
        // Implement the logic for updating a sponsor
        $src = $request->input('src');
        $alt = $request->input('alt');
        $order = $request->input('order');

        $sponsor = Sponsor::find($id);
        $sponsor->update(['src' => $src, 'alt' => $alt, 'order' => $order]);

        return response()->json($sponsor);
    }

    public function delete($id)
    {
        // Implement the logic for deleting a sponsor
        $sponsor = Sponsor::find($id);
        $sponsor->delete();

        return response()->json(['message' => 'Sponsor deleted successfully']);
    }

    public function order()
    {
        // Implement the logic for sorting sponsors by order
        $sponsors = Sponsor::orderBy('order')->get();

        return response()->json($sponsors);
    }

    public function getByName($name)
    {
        // Implement the logic for getting a sponsor by name
        $sponsor = Sponsor::where('name', $name)->first();

        return response()->json($sponsor);
    }

    public function getById($id)
    {
        // Implement the logic for getting a sponsor by ID
        $sponsor = Sponsor::find($id);

        return response()->json($sponsor);
    }

    public function getAll()
    {
        // Implement the logic for getting all sponsors
        $sponsors = Sponsor::all();

        return response()->json($sponsors);
    }
}
