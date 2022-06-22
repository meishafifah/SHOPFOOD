<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function create(Restaurant $restaurant)
    {
        $this->authorize('userRestaurant', $restaurant);
        return view('menu.create', [
            'restaurant' => $restaurant
        ]);
    }
    
    public function store(Restaurant $restaurant)
    {
        $this->authorize('userRestaurant', $restaurant);
        request()->validate([
            'name' => 'unique:menus|required',
            'description' => 'required',
            'price' => 'required',
            'picture' => 'required'
        ]);

        $picture = request()->file('picture');
        $pictureUrl = $picture->store("img/menu");

        $restaurant->menus()->create([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()-> price,
            'picture' => $pictureUrl
        ]);

        return redirect()->route('restaurant.show', $restaurant->slug);
    }

    public function edit(Menu $menu)
    {
        $this->authorize('userMenu', $menu);
       return view('menu.edit', [
        'menu' => $menu
       ]);
    }

    public function update(Menu $menu)
    {
        $this->authorize('userMenu', $menu);
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        if (request()->file('picture')) {
            \Storage::delete($menu->picture);
            $picture = request()->file('picture')->store("img/menu");
        } else {
            $picture = $menu->picture;
        }

        $menu->update([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
            'picture' => $picture
        ]);

        return redirect()->route('restaurant.show', $menu->restaurant->slug);
        
    }

    public function delete(Menu $menu)
    {
        $this->authorize('userMenu', $menu);
        $menu->delete();
        return redirect()->back();
    }
}
