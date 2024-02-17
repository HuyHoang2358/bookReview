<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');

});


Route::get('admin/login',[LoginController::class,'showAdminLoginForm'])->name("admin.auth.login");
Route::post('admin/login',[LoginController::class,'adminLogin'])->name("admin.auth.login.store");


Route::group(['prefix' => 'admin',  'middleware' => ['auth:admin']], function () {
    Route::get('/',[AdminController::class,'index'])->name("admin.index");
    Route::get('/register',[RegisterController::class,'showAdminRegistrationForm'])->name("admin.auth.register");
    Route::post('/register',[RegisterController::class,'storeAdminAccount'])->name("admin.auth.register.store");


    Route::group(['prefix' => 'category'], function () {
        Route::get('/',[CategoryController::class,'index'])->name("admin.category.index"); // danh sách danh mục
        Route::get('/add', [CategoryController::class,'add'])->name('admin.category.add'); // Trả về form thêm mới
        Route::post('/add', [CategoryController::class,'store'])->name('admin.category.store'); // tạo mới category
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [CategoryController::class,'update'])->name('admin.category.update'); // Update category
        Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('admin.category.destroy'); // delete category
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/tinymce', function () {
    return view('tinymce');
});

Route::get('/add', [PostController::class,'add'])->name('post.add'); // Trả về form thêm mới
Route::post('/add', [PostController::class,'store'])->name('post.store'); // tạo mới category
Route::get('/detail/{id}', [PostController::class,'detail'])->name('post.detail'); // tạo mới category
Route::get('/edit/{id}', [PostController::class,'edit'])->name('post.edit'); // tạo mới category
Route::post('/edit/{id}', [PostController::class,'update'])->name('post.update'); // tạo mới category

Route::get('/media', [HomeController::class,'media']); // Trả về form thêm mới

Route::get("/user/{id}",  [HomeController::class,'userInfo']);
Route::get("/avatar/{id}",  [HomeController::class,'avatarInfo']);

