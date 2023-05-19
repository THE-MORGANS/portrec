<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\RegisterUser;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    use ResponseTrait;
    //

    public function unauthorized(){
        return $this->sendError('Authorization Error.', ['error'=>'You are not authorized to be here'], $code=401);
    }

    public function registerUser(RegisterUser $request) {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['name'] = $input['firstname']." ".$input['lastname'];
        $user = User::create($input);
        $success['token'] =  $user->createToken($user->email)->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User Registered Successfully.');

    }

    public function loginUser(LoginUser $request) {
        $validated = $request->validated();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\User $user **/
            $user = Auth::user(); 
            $success['token'] =  $user->createToken($user->email)->plainTextToken; 
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User Logged In Successfully.');
        }else{
            return $this->sendError('Login Attempt Failed.', ['error'=>'Failed Login'], 401);
        }
    }

    public function userLogout(User $user) {
        $user->tokens()->delete();
        // auth()->user()->tokens()->delete();
       }
}
