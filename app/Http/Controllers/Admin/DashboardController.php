<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the Admin Dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard'); // Create this Blade view accordingly
    }
}