<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create_category(Request $request){

$request->validate([
 'name' =>'required|string'
]);

  $category= new Category();
  $category->name=$request->name;
  $category->save();
return redirect()->route('show.category');
    }

    public function show_categories(){

  $categories=Category::all();

  return view('pages.categories.categories_list',compact('categories'));

    }

    public function edit_category($id){

  $category=Category::find($id);
  return view('pages.categories.category_edit',compact('category'));

    }

    public function update_category(Request $request,$id){

      $request->validate([
     'name'=>'required|string',
      ]);

      $category=Category::find($id);
      $category->name=$request->name;
      $category->save();
      return redirect()->route('show.category');
        
    }
    public function delete_category($id){

  $category=Category::find($id);
  $category->delete();
  return redirect()->route('show.category');

}
}
