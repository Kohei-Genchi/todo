<?php

namespace App\Http\Controllers;


use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index(){
        $todos=Todo::with('category')->get();
        // dd($todos);
        $categories=Category::all();
        // dd($categories[0]['name']);

        return view('index',compact('todos','categories'));
    }
    public function store(TodoRequest $request){
// dd($request->only(['category_id']));
        $todo=$request->only(['content','category_id']);

        Todo::create($todo);
        return redirect('/')->with('success','Todo created successfully');
    }
    public function update(TodoRequest $request){
        $todo=$request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('success','Todo updated successfully');
    }
    public function destroy(Request $request){

        Todo::find($request->id)->delete();

        return redirect('/')->with('success','Todo deleted successfully');
    }
    public function search(Request $request){
        $todos=Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories=Category::all();
        return view('index',compact('todos','categories'));
    }
}
