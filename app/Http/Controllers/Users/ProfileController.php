<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    /*
        ToDo: Upload Picture
    */

    public function userProfile(){
        if (Auth::check()) {
            return $this->sendResponse(Auth::user(), 'User Profile Found');
        }else{
            return $this->sendError('Error, Please Login', ['error'=>'User Not Found'], 404); 
        }
    }

    public function updateUserProfile($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        if ($user->save()) {
            return $this->sendResponse(User::find($id), 'User Profile Updated');  
        }else{
            return $this->sendError('Error, User Profile Was Not Updated', ['error'=>'Profile Update Failed'], 400); 
        } 
    }

    public function updateUserPassword($id, Request $request){
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user = User::find($id);
        if (password_verify($request->oldpassword, $user->password)) {
            $user->password = bcrypt($request->password);
            if ($user->save()) {
                return $this->sendResponse('Password Updated', 'User Password Updated');  
            }
        }else{
            return $this->sendError('Old Password is Wrong. Pleae Check and Try Again', ['error'=>'Wrong Password'], 404);
        }

    }
}
