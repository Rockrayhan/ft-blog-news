<?php

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



// categories
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// Blogs
Route::get('/blogs', [BlogsController::class, 'index'])->name('admin.blogs.index');
Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
Route::post('/blogs', [BlogsController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}', [BlogsController::class, 'destroy'])->name('blogs.destroy');




Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/category/{category}', [FrontendController::class, 'category'])->name('category.posts');
