<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('seasons')->paginate(6);
        $seasons = Season::all();
        return view('list',compact('products','seasons'));
    }
    public function show($productId)
    {
       $product = Product::with('seasons')->findOrFail($productId);
        $allSeasons = Season::all();
        return view('detail', compact('product','allSeasons'));
       
        
    }
    public function update(ProductRequest $request ,$productId) {
     
        $product = Product::findOrFail($productId);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        if($request->has('season_id')) {
            $product->seasons()->sync($request->input('season_id',[]));
        }
        if($request->hasFile('image') && $request->file('image')->isValid()) {

        if ($product->image) {
        Storage::disk('public')->delete('images/' . $product->image);
        }
            $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            Storage::disk('public')->putFileAs(
            'images',
            $request->file('image'),
            $filename
        );
           $product->image = $filename;
        }
            $product->save();
        
            return redirect()->route('products.index');
    }
    public function destroy ($productId) {
        $product = Product::findOrFail($productId);
        $product->seasons()->detach();
        $product->delete();
        return redirect()->route('products.index');
    }
    public function add() {
        $allSeasons = Season::all();
        $product = new Product();
        return view('register',compact('allSeasons', 'product'));
    }
    public function store(ProductRequest $request) {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            Storage::disk('public')->putFileAs(
            'images',
            $request->file('image'),
            $filename
        );
            // $request->file('image')->storeAs('images', $filename, 'public');
            $product->image = $filename;
        }
        $product->save();

        if($request->has('season_id')) {
            $product->seasons()->sync($request->input('season_id',[]));
        }
        return redirect()->route('products.index');
    }
    public function search(Request $request) {
        $query = Product::query();
        $sort = $request->input('sort','');
        if($sort === 'high') {
            $query->orderBy('price', 'desc');
        } elseif($sort === 'low') {
            $query->orderBy('price', 'asc');
        }

        $keyword = $request->input('keyword');
       if($keyword) {
        $query->where('name', 'like', "%{$keyword}%");
       }
       $products = $query->paginate(6);
            
        return view('list',compact('products','keyword','sort'));
    }
}
