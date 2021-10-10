<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\PostCategory;
use App\Models\PostComment;
use Auth;

class PostController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search_key;
        
        $logged_in_user_role = Auth::user()->role;

        $posts = array();

        if($logged_in_user_role == 2){
            // for admin user
            $posts = Post::with('comments')->where('title','like','%'.$search_key.'%')
            ->paginate(env("RECORDS_PER_PAGE"));

        }else{
            // to normal user
            $posts = Post::with('comments')->where('title','like','%'.$search_key.'%')
            ->where('user_id','=',Auth::user()->id)
            ->paginate(env("RECORDS_PER_PAGE"));

        }

        foreach($posts as $post){
            $post->category = PostCategory::where('id','=',$post->category_id)->get()->first();
        }

        $categories = PostCategory::all();

        return view('posts.all_posts',compact('posts','search_key','categories'));
        
    }

    public function storePostUI(){
        $categories = PostCategory::all();
        return view('posts.new_post',compact('categories'));
    }

    public function store(Request $request){     
      
        try{
            // adding new post to database
            $post = new Post;
            $post->title = $request->title;
            $post->body = str_replace("\r\n",'', $request->body);
            $post->user_id = Auth::user()->id;
            $post->status = $request->status;
            $post->category_id = $request->category_id;

            $saved_post = Post::create($post->toArray());
        

            return back()->with('success','New post added successfully !');

        }catch(\Exception $exception){
            // error occured when saving new user
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }

    }

    
    public function update(Request $request){  
        try{
            // updating post
            $post = Post::where('id','=',$request->post_id)->get()->first();

            if($post != null){

                $post->title = $request->title;
                $post->body =  str_replace("\r\n",'', $request->body);
                $post->status = $request->status;
                $post->category_id = $request->category_id;
    
                $post->save();

                return back()->with('success','Post updated successfully !');
            }else{
                return back()->with('danger','Could not find the post');
            }
           

        }catch(\Exception $exception){
            // error occured when updating post
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }

    }

    public function deleteBlogPost($id){
        try{
            // deleting comments
            $comments = PostComment::where('post_id','=',$id)->delete();
            $post = Post::where('id','=',$id)->delete();

            if($post){
                return back()->with('success','Post and the comments deleted successfully !');
            }else{
                return back()->with('danger','Could not find the post');
            }
           

        }catch(\Exception $exception){
            // error occured when deleting post
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }

    public function addComment(Request $request){
        try{
            // adding a comment for the post

            $user_id = null;
            $username =  null;
            $user = Auth::user();

            if($user != null){
                $user_id = $user->id;
                $username = $user->name;
            }

            if($username == null){
                if(isset($request->username)){
                    $username = $request->username;
                }
            }           

            $comment = new PostComment;

            $comment->comment = $request->comment;
            $comment->post_id = $request->post_id;
            $comment->user_id = $user_id;
            $comment->username = $username;
    
            $saved_comment = PostComment::create($comment->toArray());

            return back()->with('success','Comment added successfully !');

        }catch(\Exception $exception){
            // error occured when adding comment
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }

    public function viewComments($id){
        $post = Post::with('comments')->where('id','=',$id)->get()->first();

        foreach($post->comments as $comment){

            $comment->user = null;

            if($comment->user_id != null){
                $comment->user = User::where('id','=',$comment->user_id)->get()->first();
            }

        }

        return view('posts.comments',compact('post'));
    }

    public function updateComment(Request $request){
        try{
            // updating comment
            $post_comment = PostComment::where('id','=',$request->comment_id)->get()->first();

            if($post_comment != null){

                $post_comment->comment = $request->comment;                
    
                $post_comment->save();

                return back()->with('success','Comment updated successfully !');
            }else{
                return back()->with('danger','Could not find the comment');
            }
           

        }catch(\Exception $exception){
            // error occured when updating comment
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }

    public function deleteComment($id){
        try{
            // deleting comment
            $post_comment = PostComment::where('id','=',$id)->delete();

            if($post_comment){

                return back()->with('success','Comment deleted successfully !');
            }else{
                return back()->with('danger','Could not find the comment');
            }
           

        }catch(\Exception $exception){
            // error occured when updating comment
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }
}
