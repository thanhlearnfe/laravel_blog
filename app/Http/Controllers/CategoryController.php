<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->slug),
        ]);

        return redirect()->route('categories.index')->with('status', 'Category Created Successfully');
    }
    public function edit(Category $category)
    {

        return view('categories.edit', compact('category'));
    }
    // public function update(Request $request, Teams $category)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'slug' => 'required|string|max:255',
            
    //     ]);
    //     $category->name = $request->name;
    //     $category->slug = \Str::slug($request->slug);
    //     $category->save();

    //     return redirect()->route('categories.index')->with('status', 'Category Updated Successfully');
    // }
    public function destroy(Category $post)
    {
        $post->delete();

        return redirect()->route('categories.index')->with('status', 'Category Delete Successfully');
    }
}