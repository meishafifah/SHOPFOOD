<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', [
            'restaurant' => $restaurant
        ]);
    }

    public function create()
    {
        return view('restaurant.create');
    }

    public function store(Restaurant $restaurant)
    {
        request()->validate([
            'name' => 'unique:restaurants|required',
            'description' => 'required',
            'rating' => 'required',
            'category' => 'required',
            'picture' => 'required',
        ]);
        
        $slug = \Str::slug(request()->name);
        
        // return request()->file('picture');
        $picture = request()->file('picture');
        $pictureUrl = $picture->store("img/restaurant");

        Restaurant::create([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'rating' => request()->rating,
            'category' => request()->category,
            'picture' => $pictureUrl,
        ]);

        return redirect()->route('index');
    }

    public function delete(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('index');
    }
}
