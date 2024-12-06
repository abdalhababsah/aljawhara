<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // Assuming Product model exists
use App\Models\Category; // Assuming Category model exists

class DashboardController extends Controller
{
    /**
     * Show the Admin Dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch counts for products and categories
        $productCount = Product::count();
        $categoryCount = Category::count();

        // Pass the counts to the view
        return view('admin.dashboard', [
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
        ]);
    }
}