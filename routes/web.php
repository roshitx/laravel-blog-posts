<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman home
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

// Halaman about
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "nama" => "Muhammad Aulia Rasyid Alzahrawi",
        "email" => "auliarasyidalzahrawi@gmail.com",
        "img" => "fotosmproshit.JPG"
    ]);
});


// Halaman semua postingan
Route::get('/post', [PostController::class, 'index']);

// Halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Url categories /categories
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});



// ROUTE LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); /* View login page */
Route::post('/login', [LoginController::class, 'authenticate']); /* Sent request login to authenticate method */

// ROUTE LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);

// ROUTE REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); /* View register page */
Route::post('/register', [RegisterController::class, 'store']); /* Sent request regiest to store method */

// ROUTE DASHBOARD ADMIN
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth'); /* View dashboard page */

// ROUTE UNTUK OTOMISASI SLUGGABLE PADA POST FORM
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// ROUTE CRUD POSTS DASHBOARD UNTUK FUNGSI HAPUS
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth')->scoped([
    'post' => 'slug'
]);

// ROUTE CONTROLLER CATEGORY
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// ROUTE UNTUK OTOMISASI SLUGGABLE PADA CATEGORY FORM
Route::get('/dashboard/category/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');

// ROUTE CRUD CATEGORIES DASHBOARD UNTUK FUNGSI HAPUS
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth')->scoped([
    'category' => 'slug'
]);
