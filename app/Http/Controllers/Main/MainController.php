<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;


class MainController extends Controller
{

    public function index(){
        $products = Product::all();
        $locations = Location::getAllLocations();
        $categories = Category::all();
        return view('main.indexPage' , compact('locations', 'categories', 'products'));
    }


}
