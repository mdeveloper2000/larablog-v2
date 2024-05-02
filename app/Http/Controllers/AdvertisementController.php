<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function create() {
        return view('advertisements.create');
    }

    public function store(Request $request) {        
        $formFields = $request->validate([
            'url_img' => ['required', 'image', 'mimes:png,jpg,jpeg|max:204800']
        ]);
        $formFields['user_id'] = auth()->id();
        if($request->hasFile('url_img')) {
            $formFields['url_img'] = $request->file('url_img')->store('images', 'public'); 
        }
        Advertisement::create($formFields);
        return redirect('/')->with('message', 'Advertisement created successfully');
    }

    

}
