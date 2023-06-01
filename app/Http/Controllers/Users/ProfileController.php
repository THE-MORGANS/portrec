<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\UpdateUserProfile;
use App\Http\Requests\User\UpdateUserPassword;
use App\Http\Traits\ResponseTrait;

class ProfileController extends Controller
{

    use ResponseTrait;

    public function userProfile(){
        if (Auth::check()) {
            return $this->sendResponse(Auth::user(), 'User Profile Found');
        }else{
            return $this->sendError('Error, Please Login', ['error'=>'User Not Found'], 404); 
        }
    }

    public function updateUserProfile($id, UpdateUserProfile $request){
        $user = User::whereId($id)->first();
       // $user->name = $request->name;
        // $user->phone = $request->phone;
        // $user->gender = $request->gender;
        if ($user->fill($request->only(['name', 'phone', 'gender']))->save()) {
            return $this->sendResponse($user, 'User Profile Updated');  
        }else{
            return $this->sendError('Error, An error occured, request failed', ['error'=>'Profile Update Failed'], 400); 
        } 
    }

    public function updateUserPassword($id, UpdateUserPassword $request){
        $user = User::find($id);
        if (password_verify($request->oldpassword, $user->password)) {
            if (!Hash($user->password, $request->password)) { 
                return $this->sendError('New and Old Password Must be Different', ['error'=>'Change Password'], 500);
            }
            $user->password = bcrypt($request->password);
            if ($user->save()) {
                return $this->sendResponse('Password Updated', 'User Password Updated');  
            }
        }else{
            return $this->sendError('Old Password is Wrong. Pleae Check and Try Again', ['error'=>'Wrong Password'], 401);
        }
    }
}
