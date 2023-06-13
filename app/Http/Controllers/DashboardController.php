<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productcount = Product::where('status', 'accepted')->count();
        $usercount = User::where('role_id', 3)->count();
        $slidercount = Slider::where('status', 'accepted')->count();
        $users = User::all();

        return view('dashboard', compact('productcount', 'usercount', 'slidercount', 'users'));
    }
}
