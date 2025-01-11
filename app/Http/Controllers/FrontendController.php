<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   
    public function home(){
        $categories = Category::all();
        return view('frontend.home', compact('categories')) ;
    }


    public function category(string $id)
    {
        $category = Category::find($id);
        // Get all posts related to the given category
        $blogs = Blog::where('category_id', $category->id)->get();
        
        // Return the view with the blogs for this category
        return view('frontend.category', compact('blogs', 'category'));
    }
}
