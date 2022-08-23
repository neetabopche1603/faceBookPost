<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userHome()
    {
        $data['posts'] = Post::join('users','users.id','=','posts.user_id')->select('posts.*','users.name as user_name','users.profile_img as profile_img')->get();
        
        return view('users.home', $data);
    }

    public function userProfileUpdate(){
        $userProfile = Auth::user();
     return view('users.userProfileUpdate',compact('userProfile'));
    }

    public function profileUpdate(Request $request){
    
        $profileUpdate = User::find($request->id);

        $profileUpdate->name = $request->name;
        $profileUpdate->email = $request->email;
        $profileUpdate->mobile = $request->mobile;
        $profileUpdate->address = $request->address;

        if($request->file('profile_img')){
            $image = $request->file('profile_img');
            $destinationPath = 'profile_image';
            $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $uploadImage);
            $profileUpdate->profile_img =  $uploadImage;
        }
        $profileUpdate->update();
        return redirect()->route('user.profileUpdate')->with('success','Post Update Successfully.....!');
    }

    public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        // dd('Password change successfully.');
        return redirect()->back()->with('password','Password Successfully Changed......!');

    }

}
