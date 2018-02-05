<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::create([
           'name' => $request->name
        ]);

        $category->save();

        Session::flash('success', 'Category is created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'Category is updated');
        return redirect()->route('categories');

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        foreach($category->posts as $post)
        {
            $post->forceDelete();
        }
        $category->delete();

        Session::flash('info', 'Category is Deleted');
        return redirect()->back();
    }

}
