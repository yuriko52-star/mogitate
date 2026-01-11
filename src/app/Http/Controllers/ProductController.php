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
            /*$request->file('image')->storeAs('images', $filename, 'public');
            */
            $product->image = $filename;
             // ここで存在確認
             /*if (!Storage::disk('public')->exists('images/' . $filename)) {
            // dd('save failed');
             }
            // 後から削除
        if ($product->image) {
        Storage::disk('public')->delete('images/' . $product->image);
        }
        $product->image = $filename;


            // dd($request->file('image'));
            /*if($product->image) {
                 // 既存画像削除
                  Storage::disk('public')->delete('images/' . $product->image);
                }
                  */
               // 保存 
            // $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            // $path = $request->file('image')->storeAs('images', $filename, 'public');
            /*dd(
                $path,
                file_exists(storage_path('app/public/' . $path))
    );
    */
             // ★ DB 更新もここで確定
            // $product->image = $filename;
            // $validated['image'] = "/storage/images/$filename";

        }
        $product->save();
        /*dd(
    file_exists(storage_path('app/public/images/' . $filename)),
    storage_path('app/public/images/' . $filename)
);
*/
        return redirect()->route('products.index');
    }
}
