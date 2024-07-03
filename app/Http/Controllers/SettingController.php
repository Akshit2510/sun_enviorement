<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
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
    public function edit(Request $request)
    {   

        if ($request->isMethod('post'))
        {

            $validatedData = $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg|max:2048', // Example validation for image upload
                'favicon' => 'image|mimes:jpeg,png,jpg|max:2048', // Example validation for image upload
                'fb_url' => 'required|url',
                'twitter_url' => 'required|url',
                'address' => 'required|string',
                'company_phone' => 'required|string',
                'company_phone_2' => 'required|string',
                'company_email' => 'required|email',
                'company_name' => 'required',
                'footer_message' => 'required',
            ]);


            foreach ($request->all() as $key => $value) {
                if ($key != '_token') {
                    if ($key == 'logo' || $key == 'favicon') {
                        $image = $request->file($key);

                        $imageName = time()."_".$key. '.' . $image->getClientOriginalExtension();

                        $image->move(public_path('image'), $imageName);
                        
                        $imagePath = 'image/' . $imageName;
                        $setting['title'] = $key;
                        $setting['value'] = $imagePath;
                    } else {
                        $setting['title'] = $key;
                        $setting['value'] = $value;
                    }

                    Setting::where('title',$key)->update($setting);
                }
            }

            return redirect()->back()->with('success', 'Settings updated successfully.');
        }

        $setting = Setting::all();
        return view('admin.setting.edit',compact('setting'));
    }

}
