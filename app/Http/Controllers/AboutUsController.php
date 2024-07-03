<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $aboutUs = aboutUs::first();
        return view('admin.aboutUs.create',compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'our_mission_title' => 'required|string|max:255',
            'our_mission_description' => 'required|string',
            'our_mission_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'souls_title' => 'required|string|max:255',
            'souls_description' => 'required|string',
            'souls_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Validate the request
        $validatedData = $request->validate($rules);

        if ($request->hasFile('our_mission_image')) {
            $ourMissionImage = $request->file('our_mission_image');
            $ourMissionImageName = time().'.'.$ourMissionImage->getClientOriginalExtension();
            $ourMissionImagePath = 'OurMissionImages/' . $ourMissionImageName;
            $ourMissionImage->move(public_path('OurMissionImages'), $ourMissionImageName);
        }

        if ($request->hasFile('souls_image')) {
            $soulsImage = $request->file('souls_image');
            $soulsImageName = time().'.'.$soulsImage->getClientOriginalExtension();
            $soulsImagePath = 'SoulsImages/' . $soulsImageName;
            $soulsImage->move(public_path('SoulsImages'), $soulsImageName);
        }

        // Create new AboutUs instance
        $aboutUs = AboutUs::firstOrNew();
        $aboutUs->our_mission_title = $validatedData['our_mission_title'];
        $aboutUs->our_mission_description = $validatedData['our_mission_description'];
        if(isset($request->our_mission_image) && !empty($request->our_mission_image)){$aboutUs->our_mission_image = $ourMissionImagePath ?? null;}
        $aboutUs->souls_title = $validatedData['souls_title'];
        $aboutUs->souls_description = $validatedData['souls_description'];
        if(isset($request->souls_image) && !empty($request->souls_image)){$aboutUs->souls_image = $soulsImagePath ?? null;}
        
        // Save the data
        $aboutUs->save();

        // Redirect or do something else upon successful save
        return redirect()->route('aboutUs.create')->with('success', 'data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(aboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aboutUs $aboutUs)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, aboutUs $aboutUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aboutUs $aboutUs)
    {
        //
    }
}
