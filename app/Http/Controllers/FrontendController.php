<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home()
    {
        $categories = Category::all();
        return view('frontend.home', compact('categories'));
    }


    public function category(string $id)
    {
        $category = Category::find($id);
        // Get all posts related to the given category
        $blogs = Blog::where('category_id', $category->id)->get();

        // Return the view with the blogs for this category
        return view('frontend.category', compact('blogs', 'category'));
    }

    

    public function blogDetails($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog or throw a 404 error
        return view('frontend.blog-detail', compact('blog')); // Return a view for the blog details
    }
}
