<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function update(Request $request ,$productId) {
     
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
}
