<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;

class PostCategoryController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search_key;
        $categories = PostCategory::where('category_name','like','%'.$search_key.'%')
        ->paginate(env("RECORDS_PER_PAGE"));

        return view('post_categories.all_categories',compact('categories','search_key'));
    }

    public function store(Request $request){

        try{
            $category = new PostCategory;

            $category->category_name = $request->category_name;
            $category->description = $request->description;

            $saved_category = PostCategory::create($category->toArray());

            return back()->with('success','New post category added successfully !');
        }catch(\Exception $exception){
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }

    public function update(Request $request){
        try{
            $category = PostCategory::where('id','=',$request->category_id)->get()->first();

            if($category != null){
                $category->category_name = $request->category_name;
                $category->description = $request->description;
    
                $category->save();
                return back()->with('success','Post category updated successfully !');
            }else{
                return back()->with('danger','Could not find the post category');
            }           

           
        }catch(\Exception $exception){
            return back()->with('danger','Error occured - '.$exception->getMessage());
        }
    }
}
