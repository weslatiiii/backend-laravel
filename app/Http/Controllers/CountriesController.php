<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    //
    public function add(Request $request)
    {
        $name = $request->input('name');

        // Create a new country
        $country = Country::create(['name' => $name]);

        return response()->json($country);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');

        // Find the country by ID
        $country = Country::find($id);

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        // Update the country's name attribute
        $country->update(['name' => $name]);

        return response()->json($country);
    }

    public function delete($id)
    {
        // Find the country by ID and delete it
        $country = Country::find($id);

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        $country->delete();

        return response()->json(['message' => 'Country deleted successfully']);
    }

    public function getAll()
    {
        // Retrieve all countries
        $countries = Country::all();

        return response()->json($countries);
    }

    public function getByName($name)
    {
        // Find the country by name
        $country = Country::where('name', $name)->first();

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        return response()->json($country);
    }

    public function getById($id)
    {
        // Find the country by ID
        $country = Country::find($id);

        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        return response()->json($country);
    }
}
