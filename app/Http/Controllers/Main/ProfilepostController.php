<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class ProfilepostController extends Controller
{
    public function index()
{
    $rentals = Rental::where('owner_id', auth()->id())
    ->with('product.category') // Load product and its category
    ->get();


    return view('main.dashboardPostPage', compact('rentals'));
}


    }

