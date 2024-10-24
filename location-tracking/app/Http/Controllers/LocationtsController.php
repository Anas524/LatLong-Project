<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ltsmap;

class LocationtsController extends Controller
{
    public function homeView() {
        return view('location-ts');
    }

    public function addLocationts(Request $request) {
        // Validate the input
        $validated = $request->validate([
            'location_name' => 'required|string', // This location_name is get from html file
        ]);

        // Get the input location_name
        $locationName = $validated['location_name'];

        // Split the location string by commas
        $locationParts = explode(',', $locationName);
        
        // Calculate the number of location parts
        $numParts = count($locationParts);

        // Ensure we have at least 6 parts (otherwise, return an error or handle accordingly)
        if ($numParts < 6) {
            return redirect()->back()->withErrors(['location_name' => 'Location data must have at least 6 parts.']);
        }

        // Initialize variables with default values (null for missing parts)
        $street = '';
        $city = null;
        $district = null; 
        $region = null; 
        $zip_code = null; 
        $country = null;


        // Handle excess parts for street/locality
    $excessParts = array_slice($locationParts, 0, $numParts - 6); // Capture all extra parts before the last 6
    $street = implode(', ', $excessParts); // Concatenate the excess parts with commas
    
    // Assign the last 6 parts to respective fields
    $city = trim($locationParts[$numParts - 6]);
    $district = trim($locationParts[$numParts - 5]);
    $region = trim($locationParts[$numParts - 4]);
    $zip_code = trim($locationParts[$numParts - 3]);
    $country = trim($locationParts[$numParts - 2]);

    // Now, handle the last part
    $country = trim($locationParts[$numParts - 1]);


        // Save the data to the database with snake_case column names
        $newLocation = ltsmap::create([
            'street_locality' => $street,  // All excess data will now be stored in this column
            'city_town_village' => $city,
            'district' => $district,
            'region_state_province' => $region,
            'zip_code_postcode' => $zip_code,
            'country' => $country,
        ]);

        // Fetch all locations for displaying on the map
        $locations = ltsmap::all();
        
        // Pass the new location details back to the view
        return redirect()->route('location-ts')
            ->with('newLocation', $newLocation) // Pass the added location details to the view
            ->with('locations', $locations); // Pass all locations to the view
    }
}
