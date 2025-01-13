<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }



      // Show Admin Dashboard
      public function index()
      {
          $categories = Category::all(); 
          $blogs = Blog::all(); 
          return view('admin.dashboard', compact('blogs','categories' ));
      }
  

}
