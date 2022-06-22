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
        $searchDatas = null;
        if (request()->has('search')) {
            $searchDatas = Restaurant::where('name', 'like',"%".request()->search."%")->get();
        }

        $restaurantsBreakfast = Restaurant::where('category', 'breakfast')->where('status', 'approved')->get();
        $restaurantsLunch = Restaurant::where('category', 'lunch')->where('status', 'approved')->get();
        $restaurantsDinner = Restaurant::where('category', 'dinner')->where('status', 'approved')->get();

        return view('index', [
            'restaurantBreakfast' => $restaurantsBreakfast,
            'restaurantLunch' => $restaurantsLunch,
            'restaurantDinner' => $restaurantsDinner,
            'searchDatas' => $searchDatas
        ]);
    }
}
