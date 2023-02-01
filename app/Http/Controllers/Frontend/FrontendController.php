<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Share;


use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    //frontend home page
    public function index(){
        return view('frontend.home.index');
    }//end method


    //post details(post single page)
    public function postDetails($id){
        $post=Post::find($id);

        $comments=Comment::where('post_id',$post->id)->get();



        return view('frontend.post.post_details',compact('post','comments'));
    }//end  method



    //category wise post
    public function categorywisePost($id){
        $categorywist_posts=Post::where('category',$id)->paginate(6);
        return view('frontend.post.categorywise_post',compact('categorywist_posts'));
    }//end method


    //tag wise post
    public function tagwisePost($id){
        $tag=Tag::where('id',$id)->first();

        $tagwise_posts = DB::table('posts')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('post_tag.tag_id', '=', $id)
            ->select('posts.*','users.name', 'post_tag.tag_id','post_tag.post_id')
            ->orderBy('id','desc')
            ->paginate(6);



            return view('frontend.post.tagwise_post',compact('tagwise_posts','tag'));

    }//end method



    //post search
    public function searchPost(Request $request){
        $searchPosts=Post::where([
            ['post_title','!=',Null],
            [function ($query) use ($request){
            if($post_title=$request->post_title){
                $query->orWhere('post_title', 'LIKE', '%' . $post_title . '%')->get();
            }
            }]
        ])
        ->orderBy('id','desc')
        ->limit(4)
        ->get();

        return view('frontend.post.search_post',compact('searchPosts'));
    }//end method
















}//end main
