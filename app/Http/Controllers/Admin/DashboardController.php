<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rental;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the count of products, rentals, reviews, and users
        $productCount = Product::count();
        $categoryCount = Category::count();
        $rentalCount = Rental::count();
        // $reviewCount = Review::count();
        $userCount = User::count();

        $rentalCountsByMonth = Rental::whereBetween('rental_start_date', [Carbon::now()->subYear(), Carbon::now()])
        ->selectRaw('MONTH(rental_start_date) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->pluck('count', 'month')
        ->toArray();

    // Ensure all months are represented, even if there were no rentals in a given month
    $rentalCountsByMonth = array_replace(array_fill(1, 12, 0), $rentalCountsByMonth);

    return view('admin.dashboard', compact('productCount', 'rentalCount', 'categoryCount', 'userCount', 'rentalCountsByMonth'));
}
}
