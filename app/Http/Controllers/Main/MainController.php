<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){
        $products = Product::all();
        $products = Product::with('category');
        return view('main.indexPage' , compact('products'));
    }


}
