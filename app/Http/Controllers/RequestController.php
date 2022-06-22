<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Restaurant::where('status', 'pending')->get();
        return view('request.index', [
            'requests' => $requests
        ]);
    }

    public function create()
    {
        return view('request.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'unique:restaurants|required',
            'description' => 'required',
            'category' => 'required',
            'picture' => 'required',
        ]);
        
        $slug = \Str::slug(request()->name);
        
        // return request()->file('picture');
        $picture = request()->file('picture');
        $pictureUrl = $picture->store("img/restaurant");

        auth()->user()->restaurant()->create([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'category' => request()->category,
            'picture' => $pictureUrl,
        ]);

        return redirect()->route('index');
    }

    public function approve(Restaurant $restaurant)
    {
        $user = $restaurant->user;
        
        $restaurant->update([
            'status' => 'approved'
        ]);

        $user->update([
            'role' => 'admin'
        ]);

        return redirect()->back();
    }

    public function decline(Restaurant $restaurant)
    {
        $restaurant->update([
            'status' => 'declined'
        ]);

        return redirect()->back();
    }

}
