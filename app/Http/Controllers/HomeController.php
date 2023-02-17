<?php

namespace App\Http\Controllers;

use App\Domain\Products\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('is_active', 1)->get();

        return view('home')->with('products', $products);
    }
}
