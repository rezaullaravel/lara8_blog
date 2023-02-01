<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Tag;

class TagController extends Controller
{
    //tag list
    public function tagList(){
        $tags=Tag::orderBy('id','desc')->paginate(4);

        Session::put('tag_list_url',request()->fullUrl());

        return view('backend.tag.tag_list',compact('tags'));
    }//end method


    //tag create
    public function tagCreate(){
        return view('backend.tag.tag_create');
    }//end method



    //tag store
    public function tagStore(Request $request){
        $request->validate([
            'tag_name'=>'required|unique:tags',
        ]);




        //data insert
        $tag=new Tag();

        $tag->tag_name=$request->tag_name;

        $tag->tag_slug = Str::of($request->tag_name)->slug('-');

        $tag->tag_description=$request->tag_description;

        $tag->save();

        return redirect()->back()->with('message','Tag Created Successfully');

    }//end method



    //tag edit
    public function tagEdit($id){
        $tag=Tag::find($id);
        return view('backend.tag.tag_edit',compact('tag'));
    }//end method



    //tag update
    public function tagUpdate(Request $request){
        $request->validate([
            'tag_name'=>'required|unique:tags',
        ]);




        //data insert
        $tag=Tag::find($request->id);

        $tag->tag_name=$request->tag_name;

        $tag->tag_slug = Str::of($request->tag_name)->slug('-');

        $tag->tag_description=$request->tag_description;

        $tag->save();

        if(session('tag_list_url')){
            return redirect(session('tag_list_url'))->with('message','Tag Updated Successfully');
        } else{
            return redirect('/tag/list')->with('message','Tag Updated Successfully');
        }
    }//end method


    //tag delete
    public function tagDelete($id){
        $tag=Tag::find($id)->delete();
        if(session('tag_list_url')){
            return redirect(session('tag_list_url'))->with('message','Tag Deleted Successfully');
        } else{
            return redirect('/tag/list')->with('message','Tag deleted successfully');
        }
    }//end method














}//end main
