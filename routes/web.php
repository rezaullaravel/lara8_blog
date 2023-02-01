<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;

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



Auth::routes();


//user dashboard
Route::get('/user/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','isUser']);


//admin dashboard
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',[AdminDashboardController::class,'index']);
});


/**================================Frontend all route start========================================= */
//frontend home page
Route::get('/',[FrontendController::class,'index']);

//post details(single page)
Route::get('/post/single/{id}',[FrontendController::class,'postDetails'])->name('post.single');

//category wise post
Route::get('/category/wise/post/{id}',[FrontendController::class,'categorywisePost'])->name('categorywise.post');

//tag wise post
Route::get('/tag/wise/post/{id}',[FrontendController::class,'tagwisePost'])->name('tagwise.post');

//comment store
Route::post('/comment/store',[CommentController::class,'storeComment'])->name('store.comment');

//comment edit
Route::get('/comment/edit/{post_id}/{comment_id}',[CommentController::class,'editComment'])->name('comment.edit');

//comment update
Route::post('/comment/update',[CommentController::class,'updateComment'])->name('comment.update');

//comment delete
Route::get('/comment/delete/{id}',[CommentController::class,'deleteComment'])->name('comment.delete');

//post search
Route::get('/post/search',[FrontendController::class,'searchPost'])->name('post.search');
/**================================Frontend all route end========================================= */


//=================================Backend all route start===================================== //

/*====================== Category all route start=========================== */
Route::prefix('category')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/list',[CategoryController::class,'categoryList'])->name('category.list');

    Route::get('/create',[CategoryController::class,'categoryCreate'])->name('category.create');

    Route::post('/store',[CategoryController::class,'categoryStore'])->name('category.store');

    Route::get('/edit/{id}',[CategoryController::class,'categoryEdit'])->name('category.edit');

    Route::post('/update',[CategoryController::class,'categoryUpdate'])->name('category.update');

    Route::get('/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category.delete');


});
/*====================== Category all route end=========================== */


/*====================== Tag all route start=========================== */
Route::prefix('tag')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/list',[TagController::class,'tagList'])->name('tag.list');

    Route::get('/create',[TagController::class,'tagCreate'])->name('tag.create');

    Route::post('/store',[TagController::class,'tagStore'])->name('tag.store');

    Route::get('/edit/{id}',[TagController::class,'tagEdit'])->name('tag.edit');

    Route::post('/update',[TagController::class,'tagUpdate'])->name('tag.update');

    Route::get('/delete/{id}',[TagController::class,'tagDelete'])->name('tag.delete');


});
/*====================== Tag all route end=========================== */


/*====================== Post all route start=========================== */
Route::prefix('post')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/list',[PostController::class,'PostList'])->name('post.list');

    Route::get('/create',[PostController::class,'postCreate'])->name('post.create');

    Route::post('/store',[PostController::class,'postStore'])->name('post.store');

    Route::get('/edit/{id}',[PostController::class,'postEdit'])->name('post.edit');

    Route::post('/update',[PostController::class,'postUpdate'])->name('post.update');

    Route::get('/delete/{id}',[PostController::class,'postDelete'])->name('post.delete');

    Route::get('/view/{id}',[PostController::class,'postView'])->name('post.view');


});
/*====================== Post all route end=========================== */

//=================================Backend all route end===================================== //
