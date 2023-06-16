<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function  debug($data, $die = true)
    {
      echo '<pre>';
      print_r($data);
      echo '</pre>';
      if ($die) {
        die();
      }
    }
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);//Bắt đầu truy vấn một model -> Thêm mệnh đề "order by" cho dấu thời gian vào truy vấn.->Đánh số trang cho truy vấn đã cho.
        // $this->debug($posts);
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();// Lấy tất cả dữ liệu từ cơ sở dữ liệu.

        return view('posts.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
        Post::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->slug),
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('posts.index')->with('status', 'Post Created Successfully');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('categories', 'post'));
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
        ]);
        $post->title = $request->title;
        $post->slug = \Str::slug($request->slug);
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index')->with('status', 'Post Updated Successfully');
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Post Delete Successfully');
    }
}