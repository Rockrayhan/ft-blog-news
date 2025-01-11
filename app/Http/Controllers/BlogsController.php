<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('admin.blogs.index', compact('blogs'));
    }


    public function create()
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.blogs.create', compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'author' => 'required|max:255',
            'tags' => 'nullable|max:255',
        ]);

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'tags' => $request->tags,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }



    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'author' => 'required|max:255',
            'tags' => 'nullable|max:255',
        ]);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'tags' => $request->tags,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }


    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
