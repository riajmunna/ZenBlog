<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZenBlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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

Route::get('/',[ZenBlogController::class,'index'])->name('home');



Route::get('about/', [ZenBlogController::class, 'about'])->name('about');

Route::get('contact/', [ZenBlogController::class, 'contact'])->name('contact');

Route::get('zen-category/{catId}', [ZenBlogController::class, 'category'])->name('zen.category');

Route::get('user-register/', [ZenBlogController::class, 'userRegister'])->name('user.register');

Route::post('user-register/', [ZenBlogController::class, 'saveUser'])->name('user.register');

Route::get('user-login/', [ZenBlogController::class, 'userLogin'])->name('user.login');

Route::post('user-login/', [ZenBlogController::class, 'checkUserLogin'])->name('user-login');

Route::get('logout/', [ZenBlogController::class, 'logout'])->name('logout');

Route::post('new-comment',[CommentController::class,'saveComment'])->name('new.comment');

Route::group(['middleware' => 'blogUser'],function (){
    Route::get('blog-details/{slug}', [ZenBlogController::class, 'blogDetails'])->name('blog.detail');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('dashboard/',[DashboardController::class,'index'])->name('dashboard');

    //-------------- CategoryController -----------------//
    Route::get('category/',[CategoryController::class,'index'])->name('category');
    Route::get('update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('add-category/',[CategoryController::class,'addCategory'])->name('add.category');
    Route::post('category-update-form/',[CategoryController::class,'categoryUpdateForm'])->name('category.update.form');
    Route::post('category-delete/',[CategoryController::class,'categoryDelete'])->name('category.delete');

    //-------------- AuthorController -----------------//
    Route::get('author/',[AuthorController::class,'index'])->name('author');
    Route::get('author-update/{id}',[AuthorController::class,'authorUpdate'])->name('author.update');
    Route::post('add-author/',[AuthorController::class,'addAuthor'])->name('add.author');
    Route::post('author-update-form/',[AuthorController::class,'authorUpdateForm'])->name('author.update.form');
    Route::post('delete-author/',[AuthorController::class,'deleteAuthor'])->name('delete.author');

    //------------- BlogController --------------------//
    Route::get('add-blog/',[BlogController::class,'addBlog'])->name('add.blog');
    Route::post('save-blog/',[BlogController::class,'saveBlog'])->name('save.blog');
    Route::post('delete-blog/',[BlogController::class,'deleteBlog'])->name('delete.blog');
    Route::post('blog-update-form/',[BlogController::class,'blogUpdateForm'])->name('blog.update.form');
    Route::get('manage-blog/',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('blog-update/{id}',[BlogController::class,'blogUpdate'])->name('blog.update');
    Route::get('status/{id}',[BlogController::class,'status'])->name('status');

});
