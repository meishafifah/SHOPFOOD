<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    public function show(Restaurant $restaurant)
    {
        $menus = $restaurant->menus;

        return view('restaurant.show', [
            'restaurant' => $restaurant,
            'menus' => $menus
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
            'user_id' => request()->user_id,
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'rating' => request()->rating,
            'category' => request()->category,
            'picture' => $pictureUrl,
        ]);

        return redirect()->route('index');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }

    public function update(Restaurant $restaurant)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'category' => 'required'
        ]);
        
        if (request()->file('picture')) {
            \Storage::delete($restaurant->picture);
            $picture = request()->file('picture')->store("img/restaurant");
        } else {
            $picture = $restaurant->picture;
        }

        $slug = \Str::slug(request()->name);

        $restaurant->update([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'category' => request()->category,
            'rating' => request()->rating,
            'picture' => $picture,
        ]);

        return redirect()->route('index');

    }

    public function delete(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('index');
    }
}
