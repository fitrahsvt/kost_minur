<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {

        // mengambil data category
        $categories = Category::all();

        // mengambil data slider
        $sliders = Slider::where('status', 'accepted')->get();

        if ($request->category) {
            $products = Product::with('category')->where('status', 'accepted')->whereHas('category', function ($query) use ($request){
                $query->where('name', $request->category);
            })->paginate(8);

        }else if ($request->min && $request->max){
            $products = Product::where('status', 'accepted')->where('price', '>=', $request->min)->where('price', '<=', $request->max)->get();
            $min = $request->min;
            $max = $request->max;
            return view('landing', compact('products', 'categories', 'sliders', 'min', 'max'));

        }else if ($request->search){
            $products = Product::where('name','LIKE','%'.$request->search.'%')->get();
            $search = $request->search;
            return view('landing', compact('products', 'categories', 'sliders', 'search'));

        }else{
            // mengambil 12 data produk secara acak
            $products = Product::where('status', 'accepted')->inRandomOrder()->limit(12)->get();

        }

        return view('landing', compact('products', 'categories', 'sliders'));
    }
}
