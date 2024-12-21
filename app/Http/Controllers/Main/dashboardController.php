<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class dashboardController extends Controller
{

    public function index(){
        $products = Product::where('user_id', auth()->id())->get();
        return view('main.dashboard', ['products' =>$products]);
    }

}
