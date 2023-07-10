<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //category list
    public function categoryList(){
        $categories=Category::orderBy('id','desc')->paginate(4);

        Session::put('category_list_url',request()->fullUrl());

     return view('backend.category.category_list',compact('categories'));
    }//end method


    //category create
    public function categoryCreate(){
        return view('backend.category.category_create');
    }//end method



    //category store
    public function categoryStore(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
        ]);


        //data insert
        $category=new Category();

        $category->category_name=$request->category_name;

        $category->category_slug = Str::of($request->category_name)->slug('-');

        $category->category_description=$request->category_description;

        $category->save();

        return redirect()->back()->with('message','Category Created Successfully');


    }//end method



    //category edit
    public function categoryEdit($id){
        $category=Category::find($id);
        return view('backend.category.category_edit',compact('category'));
    }//end method


    //update category
    public function categoryUpdate(Request $request){
        // $request->validate([
        //     'category_name'=>'required|unique:categories',
        // ]);

        $category=Category::find($request->id);
        $category->category_name=$request->category_name;

        $category->category_slug = Str::of($request->category_name)->slug('-');

        $category->category_description=$request->category_description;

        $category->save();

        if(session('category_list_url')){
            return redirect(session('category_list_url'))->with('message','Category Updated Successfully');
        } else{
            return redirect('/category/list')->with('message','Category Updated Successfully');
        }

    }//end method




    //delete category
    public function categoryDelete($id){
        $category=Category::find($id)->delete();

        if(session('category_list_url')){
            return redirect(session('category_list_url'))->with('message','Category Deleted Successfully');
        } else{
            return redirect('/category/list')->with('message','Category Deleted Successfully');
        }
    }//end method










}//end main
