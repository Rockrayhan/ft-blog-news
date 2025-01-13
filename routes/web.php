<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/about', function () {
    // Fetch all categories
    $categories = Category::all();
    // Pass categories to the about view
    return view('frontend.about', compact('categories'));
});

Route::get('/contact', function () {
    return view('frontend.contact');
});


// admin routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');





// categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// Blogs
Route::get('/admin/blogs', [BlogsController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
Route::post('/admin/blogs', [BlogsController::class, 'store'])->name('blogs.store');
Route::get('/admin/blogs/{id}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
Route::post('/admin/blogs/{id}', [BlogsController::class, 'update'])->name('blogs.update');
Route::delete('/admin/blogs/{id}', [BlogsController::class, 'destroy'])->name('blogs.destroy');


Route::get('/blog/{id}', [FrontendController::class, 'blogDetails'])->name('blog.details');





Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/category/{category}', [FrontendController::class, 'categoryDetails'])->name('category.posts');
