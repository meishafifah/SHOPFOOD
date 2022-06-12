<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $restaurantsPopuler = Restaurant::where('category', 'populer')->get();
        $restaurantsRekomendasi = Restaurant::where('category', 'rekomendasi')->get();
        $restaurantsPromo = Restaurant::where('category', 'promo')->get();

        return view('index', [
            'restaurantPopuler' => $restaurantsPopuler,
            'restaurantRekomendasi' => $restaurantsRekomendasi,
            'restaurantPromo' => $restaurantsPromo,
        ]);
    }
}
