<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function unauthorized(){
        return $this->sendError('Authorization Error.', ['error'=>'You are not authorized to be here'], $code=401);
    }

    public function registeruser(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['name'] = $input['firstname']." ".$input['lastname'];
        $user = User::create($input);
        $success['token'] =  $user->createToken($user->email)->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User Registered Successfully.');

    }

    public function loginuser(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\User $user **/
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User Logged In Successfully.');
        }else{
            return $this->sendError('Login Attempt Failed.', ['error'=>'Failed Login']);
        }
    }

    

   public function userlogout(User $user) {
    $user->tokens()->delete();
    // auth()->user()->tokens()->delete();
   }

    public function getuser(Request $request){
        return $request->user();
    }
}
