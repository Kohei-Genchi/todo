<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('category',compact('categories'));
    }
    public function store(CategoryRequest $request){
        $category=$request->only(['name']);

        Category::create($category);
        return redirect('/categories')->with('message','Category created successfully');
    }
    public function update(CategoryRequest $request){
        $category=$request->only(['name']);


        Category::find($request->id)->update($category);
        return redirect('/categories')->with('message','Category updated successfully');
    }
    public function destroy(Request $request){
        // dd($request->id);
        Category::find($request->id)->delete();
        return redirect("/categories")->with('message','Category deleted successfully');
    }
}
