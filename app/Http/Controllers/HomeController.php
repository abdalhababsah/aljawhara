<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display the home page with products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int|null  $category_id
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Check if it's the user's first visit
        if (!$request->session()->has('first_visit')) {
            // Mark this as the first visit
            $request->session()->put('first_visit', true);
            $firstVisit = true;
        } else {
            $firstVisit = true;
        }

        // Check for category filtering
        if ($request->category_id) {
            $category = Category::find($request->category_id);

            // Fetch products based on category if the category exists
            if ($category) {
                $products = Product::where('category_id', $request->category_id)->get();
            } else {
                $products = Product::all();
            }
        } else {
            // If no category is selected, fetch all products
            $products = Product::all();
        }

        // Fetch all categories for the filter dropdown
        $categories = Category::all();

        // Pass products, categories, and firstVisit flag to the view
        return view('welcome', compact('products', 'categories', 'firstVisit'));
    }
}
