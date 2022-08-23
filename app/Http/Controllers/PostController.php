<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function addPostView(){
        return view('users.addPost');
    }
    
  
    public function addPost(Request $request)
    {
        $destinationPath = public_path('/post');
        $filename = '';
        $post = new Post();
        $post->user_id = Auth::user()->id;

        if ($request->hasfile('post')) {
            $names = [];
            foreach($request->file('post') as $image)
            {
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                array_push($names, $filename);          
        
            }
            $post->post_img = json_encode($names);
        }

        $post->desc = $request->description;
        $post->save();
       
        return redirect()->route('user.home');
    }

    public function postView(){
        $postDatas = Post::where('user_id',auth()->user()->id)->get();
        return view('users.viewPost', compact('postDatas'));
    }

    public function postEditView($id){
        $postEditViews = Post::find($id);
            return view('users.editView',compact('postEditViews'));
    }

    public function postUserUpdate(Request $request){
    
        $postUpdate = Post::find($request->id);

        $postUpdate->desc = $request->description;

        if($request->file('post') !==Null){
             // Old Image Delete Code Start
             if ($postUpdate->ipost_imgmage != NULL) {
                unlink('post/' . $postUpdate->post_img);
            }
            // Old Image Delete Code End
            $image = $request->file('post');
            $destinationPath = 'post';
            $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $uploadImage);
            $postUpdate->image =  $uploadImage;
        }
        $postUpdate->update();
        return redirect()->route('user.postView')->with('success','Post Update Successfully.....!');
    }

   public function postUserDelete($id){
    $postUserDelete = Post::find($id)->delete();
    return redirect()->route('user.postView')->with('danger','Post Update Successfully.....!');
   }

}
