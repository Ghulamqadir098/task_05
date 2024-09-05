<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create_product(Request $request){

     // Validate the request
     $request->validate([
         'name' => 'required|string|max:255',
         'description' => 'required|string|max:255',
         'price' => 'required|string|min:0',
     ]);
// dd($request->user()->id);
     // Create a new product
     $product = Product::create([
        'user_id' => $request->user()->id,
         'name' => $request->name,
         'description' => $request->description,
         'price' => $request->price,
     ]);

     return response()->json($product, 201);

    }

    public function show_products(){

   $current_user= Auth::user(); 
    $products = Product::where('user_id', $current_user->id)->get();

return view('pages.products.products_list',compact('products'));
    }

    public function edit_product($id){

$product= Product::find($id);

return view('pages.products.product_edit',compact('product'));

    }

    public function update_product(Request $request, $id){

   $product= Product::find($id);
   $product->update($request->all());
   return redirect()->route('show.product');
    }

    public function delete_product($id){

  $product= Product::find($id);
  $product->delete();
  return redirect()->route('show.product');

    }
}
