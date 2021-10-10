<?php

use Illuminate\Support\Facades\Route;\


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

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('welcome');


Auth::routes();

// User routes
Route::get('/users',[App\Http\Controllers\UserController::class, 'index'])->name('users.registered')->middleware(['auth']);
Route::get('/users/new',[App\Http\Controllers\UserController::class, 'storeUserUI'])->name('users.new')->middleware(['auth']);
Route::post('/users/new',[App\Http\Controllers\UserController::class, 'store'])->name('users.new')->middleware(['auth']);
Route::post('/users/edit',[App\Http\Controllers\UserController::class, 'update'])->name('users.edit')->middleware(['auth']);
Route::get('/users/delete/{id}',[App\Http\Controllers\UserController::class, 'deleteUser'])->name('users.delete')->middleware(['auth']);

// Blog routes
Route::get('/posts',[App\Http\Controllers\PostController::class, 'index'])->name('posts.all')->middleware(['auth']);
Route::get('/posts/new',[App\Http\Controllers\PostController::class, 'storePostUI'])->name('posts.new')->middleware(['auth']);
Route::post('/posts/new',[App\Http\Controllers\PostController::class, 'store'])->name('posts.new')->middleware(['auth']);
Route::post('/posts/edit',[App\Http\Controllers\PostController::class, 'update'])->name('posts.edit')->middleware(['auth']);
Route::get('/posts/delete/{id}',[App\Http\Controllers\PostController::class, 'deleteBlogPost'])->name('posts.postDelete')->middleware(['auth']);
Route::post('/posts/comment',[App\Http\Controllers\PostController::class, 'addComment'])->name('posts.comment');
Route::get('/posts/comments/{id}',[App\Http\Controllers\PostController::class, 'viewComments'])->name('posts.commentView')->middleware(['auth']);
Route::post('/posts/comments/edit',[App\Http\Controllers\PostController::class, 'updateComment'])->name('posts.commentEdit')->middleware(['auth']);
Route::get('/posts/comments/delete/{id}',[App\Http\Controllers\PostController::class, 'deleteComment'])->name('posts.commentDelete')->middleware(['auth']);

// Post view routes
Route::get('posts/read/{id}',[App\Http\Controllers\WebController::class, 'readPost']);
Route::get('posts/category/{id}',[App\Http\Controllers\WebController::class, 'postsForCategory']);

// Post category routes
Route::get('/categories',[App\Http\Controllers\PostCategoryController::class, 'index'])->name('categories.all')->middleware(['auth']);
Route::post('/categories/new',[App\Http\Controllers\PostCategoryController::class, 'store'])->name('categories.new')->middleware(['auth']);
Route::post('/categories/edit',[App\Http\Controllers\PostCategoryController::class, 'update'])->name('categories.edit')->middleware(['auth']);

