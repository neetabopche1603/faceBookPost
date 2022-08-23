<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $success = $comment->save();
        if($success){
            $comments = Comment::join('users','users.id','=','comments.user_id')->select('comments.*','users.name as user_name','users.profile_img as profile_img')->where('comments.post_id',$request->post_id)->orderBy('comments.id', 'DESC')->first();
            $count = Comment::where('post_id',$request->post_id)->count();
            $data=[
                'result'=>$comments,
                'count'=>$count
            ];
            return response()->json($data);
        }
        
    }

    public function getComment($post_id){
        $comments = Comment::join('users','users.id','=','comments.user_id')->select('comments.*','users.name as user_name','users.profile_img as profile_img')->where('comments.post_id',$post_id)->orderBy('comments.id', 'DESC')->get();
        $data = json_encode($comments);
        return response()->json($data);
    }
}
