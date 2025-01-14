<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    // public function index()
    // {
    //     $blogs = Blog::with('category')->get();
    //     return view('admin.blogs.index', compact('blogs'));
    // }

    public function index(Request $request)
    {
        $categoryFilter = $request->input('category');

        // Fetch blogs based on category filter
        $blogs = Blog::when($categoryFilter, function ($query, $categoryFilter) {
            return $query->where('category_id', $categoryFilter);
        })->with('category')->get();

        // Fetch all categories for the dropdown
        $categories = Category::all();

        return view('admin.blogs.index', compact('blogs', 'categories'));
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
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp,JPG,JPEG,PNG,GIF,WEBP|max:2048', // Allow uppercase extensions
        ]);

        $filename = null;

        if ($request->hasFile('image')) {
            $extension = strtolower($request->image->extension()); // Normalize the extension
            $filename = time() . '.' . $extension;
            $request->image->move(public_path('uploads'), $filename);
        }

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'tags' => $request->tags,
            'image' => $filename,
        ];

        $model = new Blog();
        if ($model->create($data)) {
            return redirect()->route('admin.blogs.index')->with('success', 'Blog uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload the blog. Please try again.');
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
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp,JPG,JPEG,PNG,GIF,WEBP|max:2048', // Optional image validation
        ]);

        $filename = $blog->image; // Retain the current image filename

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
                unlink(public_path('uploads/' . $blog->image));
            }

            // Upload the new image
            $extension = strtolower($request->image->extension());
            $filename = time() . '.' . $extension;
            $request->image->move(public_path('uploads'), $filename);
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'tags' => $request->tags,
            'image' => $filename, // Update image if a new one is uploaded
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }


    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
