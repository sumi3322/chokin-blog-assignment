<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserRole;
use App\Models\PostComment;
use App\Models\Post;

class UserController extends Controller
{
    public function index(Request $request){

        $search_key = $request->search_key;

        $users = User::where('name','like','%'.$search_key.'%')
        ->where('email','like','%'.$search_key.'%')
        ->paginate(env("RECORDS_PER_PAGE"));

        $roles = UserRole::all();

        return view('users.all_users',compact('users','search_key','roles'));
    }

    public function storeUserUI(){
        $roles = UserRole::all();
        return view('users.new_user',compact('roles'));
    }

    public function store(Request $request){     

        try{
            // adding new user to database
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            $saved_user = User::create($user->toArray());

            return back()->with('success','New user added successfully !');

        }catch(\Exception $exception){
            // error occured when saving new user
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }

    }

    
    public function update(Request $request){  
        try{
            // updating user
            $user = User::where('id','=',$request->user_id)->get()->first();

           if($user != null){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;

            $user->save();

            return back()->with('success','User updated successfully !');
           }else{
            return back()->with('danger','Could not find the user');
           }

        }catch(\Exception $exception){
            // error occured when updating user
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }

    }

    public function deleteUser($id){
        try{
            // deleting user
            $user = User::where('id','=',$id)->delete();

            $posts = Post::where('user_id','=',$id)->delete();

            $comments = PostComment::where('user_id','=',$id)->delete();

           if($user){
           
            return back()->with('success','User deleted successfully with the posts and comments !');
           }else{
            return back()->with('danger','Could not find the user');
           }

        }catch(\Exception $exception){
            // error occured when updating user
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }
    
    
}
