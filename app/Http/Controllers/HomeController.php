<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Car;
use App\Models\PostCode;
use App\Models\Vehicle;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Car::get();

        $airports = Airport::all();
        $postCodes = PostCode::all();

        return view('index', compact('vehicles', 'airports', 'postCodes'));
    }
}
