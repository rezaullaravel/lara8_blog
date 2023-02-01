<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use  Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    //post list
    public function PostList(){
        $posts=Post::orderBy('id','desc')->paginate(4);

        Session::put('post_list_url',request()->fullUrl());

        return view('backend.post.post_list',compact('posts'));
    }//end method



    //post create
    public function postCreate(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('backend.post.post_create',compact('categories','tags'));
    }//end method



    //post store
    public function postStore(Request $request){
        //form validation
        $request->validate([
            'post_title'=>'required|unique:posts,post_title',
            'post_description'=>'required',
            'post_image'=>'required',
            'category'=>'required',
        ]);




        //image upload
        if($request->file('post_image')){
            $image=$request->file('post_image');

            $image_name=rand().''.$image->getClientOriginalName();

            $img = Image::make($image)->resize(770, 340)->save('upload/post_images/'.$image_name);

            $image_url='upload/post_images/'.$image_name;

        }


        //data insert
        $post=new Post();

        $post->post_title=$request->post_title;

        $post->post_slug=Str::of($request->post_title)->slug('-');

        $post->post_description=$request->post_description;

        $post->post_image=$image_url;

        $post->category=$request->category;

        $post->user_id=Auth::User()->id;

        $post->published_at=Carbon::now();



        $post->save();

        $post->tags()->attach($request->tags);

        return redirect()->back()->with('message','Post Created Successfully');
    }//end method



    //post edit
    public function postEdit($id){
        $post=Post::find($id);

        $categories=Category::all();

        $tags=Tag::all();

        return view('backend.post.post_edit',compact('post','categories','tags'));
    }//end method


    //post update
    public function postUpdate(Request $request){

        $post=Post::find($request->id);
        $old_image=$post->post_image;

        //image upload
        if($request->file('post_image')){
            unlink($old_image);
            $image=$request->file('post_image');

            $image_name=rand().''.$image->getClientOriginalName();

            $img = Image::make($image)->resize(770, 340)->save('upload/post_images/'.$image_name);

            $image_url='upload/post_images/'.$image_name;

            $post->post_image=$image_url;

        }

        $post->post_title=$request->post_title;

        $post->post_slug=Str::of($request->post_title)->slug('-');

        $post->post_description=$request->post_description;

        $post->category=$request->category;

        $post->user_id=Auth::User()->id;

        $post->published_at=Carbon::now();

        $post->tags()->sync($request->tags);

        $post->save();

        if(session('post_list_url')){
            return redirect(session('post_list_url'))->with('message','Post Updated Successfully');
        } else{
            return redirect('/post/list')->with('message','Post Updated Successfully');
        }

    }//end method



    //post delete
    public function postDelete($id){
        $post=Post::find($id);

        $post_image=$post->post_image;

        unlink($post_image);

        $post->delete();

        if(session('post_list_url')){
            return redirect(session('post_list_url'))->with('message','Post Deleted Successfully');
        } else{
            return redirect('/post/list')->with('message','Post Deleted Successfully');
        }

    }//end method



    //post view
    public function postView($id){
        $post=Post::find($id);
        return view('backend.post.post_view',compact('post'));
    }//end method



















}//end main
