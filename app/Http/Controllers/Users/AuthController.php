<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\UserAuthTrait;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginUser;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\User\RegisterUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{

    use ResponseTrait;
    use UserAuthTrait;
    //

    public function unauthorized(){
        return $this->sendError('Authorization Error.', ['error'=>'You are not authorized to be here'], $code=401);
    }

    public function loadUserLoginPage(){
        return view('user.login');
    }

    public function loadUserRegisterPage(){
        return view('user.register');
    }

    public function registerUser(RegisterUser $request) {
        $input = $this->TraitRegisterUser($request);
        $userdata['name'] = $input['name'];
        $userdata['email'] = $input['email'];
        $userdata['password'] = Hash::make($input['password']);
        User::create($userdata);
   
        return Redirect::to('dashboard')->with('success', 'Registration Successful');

    }

    public function loginUser(Request $request) {
        
        $rules = [
            'loginemail' => 'required|email',
            'loginpassword' => 'required',
        ];
        $validator = Validator::make($request->input() , $rules);
        
        if ($validator->fails()){
        return Redirect::to('login')->withErrors($validator)->withInput($request->except('loginpassword'));
        }

        if (Auth::attempt(['email' => $request->loginemail, 'password' => $request->loginpassword])) {
            /** @var \App\Models\User $user **/
            $data['user'] = Auth::user(); 
            return Redirect::to('dashboard')->with('success', 'Login Successful');
        }else{
            return Redirect::to('login')->with('error', 'Username/Password Incorrect')->withInput($request->except('loginpassword'));
        }
    }

    public function userLogout(User $user) {
        $user->tokens()->delete();
        // auth()->user()->tokens()->delete();
       }


       public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login')->with('info', 'Logged Out');
    }
}
