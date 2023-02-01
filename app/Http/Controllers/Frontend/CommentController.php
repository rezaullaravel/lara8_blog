<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //comment store
    public function storeComment(Request $request){
        if(Auth::check()){

            $post=Post::where('id',$request->id)->first();

            $comment=new Comment();
            $comment->post_id=$post->id;
            $comment->user_id=Auth::user()->id;
            $comment->comment_description=$request->comment_description;

            $comment->save();
            return redirect()->back()->with('sms','Successfully Commented');

        } else{
            return redirect('/login')->with('sms','Login first to comment.If you are not registered plz register before.');
        }
    }//end method


    //edit comment
    public function editComment($post_id,$comment_id){
        $comment=Comment::where('id',$comment_id)->first();
        $post=Post::where('id',$post_id)->first();
        return view('frontend.comment.comment_edit',compact('comment','post'));
    }//end method


    //update comment
    public function updateComment(Request $request){
        $comment=Comment::find($request->id);
        $comment->comment_description=$request->comment_description;
        $comment->created_at=date('F j,Y');
        $comment->save();
        $url='post/single/'.$request->post_id;
        return redirect('/'.$url);

    }//end method


    //delete comment
    public function deleteComment($id){
        $comment=Comment::find($id)->delete();
        return redirect()->back();
    }










}//end main
