<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home()
    {
        // $categories = Category::all();
        $categories =  Category::where('feature_in_home', true)->get();
        return view('frontend.home', compact('categories'));
    }


    public function categoryDetails(string $id)
    {
        $category = Category::find($id);
        // Get all posts related to the given category
        $blogs = Blog::where('category_id', $category->id)->get();

        // Return the view with the blogs for this category
        return view('frontend.category-details', compact('blogs', 'category'));
    }

    

    public function blogDetails($id)
    {
        $blog = Blog::findOrFail($id); // Find the blog or throw a 404 error
        return view('frontend.blog-details', compact('blog')); // Return a view for the blog details
    }
}
