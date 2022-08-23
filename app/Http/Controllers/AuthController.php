<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function registerView(){
        return view('auth.register');
     }

     public function registerStore(Request $request){
        $request->validate([
            'name'             => 'required',                        // just a normal required validation
            'email' => "required|email|unique:users,email",   // required and must be unique in the ducks table
            'password'         => 'required',
            'password_confirm' => 'required|same:password'  
        ]);

        $register = new User();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password= Hash::make($request->password);
        $register->profile_img = 'avatar.jpg';
        $register->save();      
         return redirect()->route('login')->with('success','Register Successfully .....!');

     }

     public function loginView(){
        return view('auth.login');
     }

     public function loginStore(Request $request){
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('user.home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
     }

