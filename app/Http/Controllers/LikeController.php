<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $check_like = Like::where('post_id', $request->post_id)->where('user_id', $request->user_id)->first();
        if ($check_like) {
            $check_like->delete();
            $totalLikes = Like::where('post_id', $request->post_id)->count();
            $data = [
                'status'=>'del',
                'count'=>$totalLikes
            ];
            return response()->json($data);
        } else {
            $like = new Like();
            $like->post_id = $request->post_id;
            $like->user_id = $request->user_id;
            $like->save();
            $totalLikes = Like::where('post_id', $request->post_id)->count();
            $data = [
                'status'=>'add',
                'count'=>$totalLikes
            ];
            return response()->json($data);
        }
    }

    public function getUser($post_id)
    {
        $likes = Like::join('users','users.id','=','likes.user_id')->select('likes.*','users.name as user_name','users.profile_img as profile_img')->where('likes.post_id',$post_id)->orderBy('likes.id', 'DESC')->get();
        $data = json_encode($likes);
        return response()->json($data);
    }
}
