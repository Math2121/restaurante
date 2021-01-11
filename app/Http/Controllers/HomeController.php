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
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(10);
        return view('home',['restaurant'=>$restaurants]);
    }
        public function get(Restaurant $id)
    {
        return view('single',['id'=>$id]);       print $id;
    }
}