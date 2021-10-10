<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;

class WebController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search_key;
        
        $posts = Post::with('comments')
        ->where('status','=',1)
        ->where('title','like','%'.$search_key.'%')
        ->orderBy('created_at','desc')->get();
        $categories = PostCategory::all();

        foreach($posts as $post){
            $post->category = PostCategory::where('id','=',$post->category_id)->get()->first();
            $post->user = User::where('id','=',$post->user_id)->get()->first();
        }

        return view('web.home_page',compact('posts','categories','search_key'));
    }

    public function readPost($id){
        $post = Post::where('id','=',$id)->get()->first();
        $post->category = PostCategory::where('id','=',$post->category_id)->get()->first();
        $post->user = User::where('id','=',$post->user_id)->get()->first();
        $categories = PostCategory::all();
        return view('web.posts.view_post',compact('post','categories'));

    }

    public function postsForCategory($id){
        $posts = Post::where('category_id','=',$id)->where('status','=',1)->get();
        $categories = PostCategory::all();

        $category = PostCategory::where('id','=', $id)->get()->first();

        foreach($posts as $post){
            $post->category = PostCategory::where('id','=',$post->category_id)->get()->first();
            $post->user = User::where('id','=',$post->user_id)->get()->first();
        }

        return view('web.posts.posts_for_category',compact('posts','categories','category'));
    }
}
