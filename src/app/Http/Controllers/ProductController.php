<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('seasons')->paginate(6);
        $seasons = Season::all();
        return view('list',compact('products','seasons'));
    }
}
