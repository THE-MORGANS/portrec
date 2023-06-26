<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProfilePicture;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\UpdateUserProfile;
use App\Http\Requests\User\UpdateUserPassword;

class ProfileController extends Controller
{

    use ResponseTrait;

    public function loadUserProfilePage(){
        $userID = Auth::user()->id;
        $data['id'] = $userID;
        $data['industries'] = DB::table('industries')->get();
        // dd($data);
        return view('user.profile', $data);
    }

    public function userProfile(){
        if (Auth::check()) {
            return $this->sendResponse(Auth::user(), 'User Profile Found');
        }else{
            return $this->sendError('Error, Please Login', ['error'=>'User Not Found'], 404); 
        }
    }

    public function uploadUserProfilePicture(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:500',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->with('error', 'Image Upload Error');      
        }

        $userprofilepicture = User::find(Auth::user()->id)->profilepicture;
        if (!$userprofilepicture) {
            if($request->hasFile('image'))
            {
                $dp = $request->file('image');
                $image_name = uniqid() . '.' . $dp->getClientOriginalExtension();
                $image_path = 'uploads/profile_pics/' . $image_name;
                Image::make($dp)->resize(500, 500)->save(public_path($image_path));
                ProfilePicture::create([
                    'user_id' => Auth::user()->id,
                    'image' => $image_path,
                ]);
            }
        }else{
            if(File::exists(public_path($userprofilepicture->image))){
                File::delete(public_path($userprofilepicture->image));
              }
              if($request->hasFile('image'))
                {
                    $dp = $request->file('image');
                    $image_name = uniqid() . '.' . $dp->getClientOriginalExtension();
                    $image_path = 'uploads/profile_pics/' . $image_name;
                    Image::make($dp)->resize(500, 500)->save(public_path($image_path));
                    $userprofilepicture->user_id = Auth::user()->id;
                    $userprofilepicture->image = $image_path;
                    $userprofilepicture->save();
                }
        }

        return back()->with('success', 'Profile Picture Uploaded Successfully');
    }

    public function updateUserProfile($id, UpdateUserProfile $request){
        $user = User::whereId($id)->first();
        if ($user->fill($request->only(['name', 'phone', 'gender', 'dob', 'languages', 'industries_id', 'allow_search', 'description']))->save()) {
            return back()->with('success', 'Profile Updated Successfully');  
        }else{
            return back()->with('error', 'Profile Update Failed');
        } 
    }

    public function updateUserSocialMedia($id, Request $request){
        $user = User::whereId($id)->first();
        if ($user->fill($request->only(['facebook', 'linkedin', 'twitter', 'googleplus']))->save()) {
            return back()->with('success', 'Social Media Updated Successfully');  
        }else{
            return back()->with('error', 'Update Failed');
        } 
    }

    public function updateUserContact($id, Request $request){
        $user = User::whereId($id)->first();
        if ($user->fill($request->only(['country', 'state', 'address']))->save()) {
            return back()->with('success', 'Contact Address Updated Successfully');  
        }else{
            return back()->with('error', 'Update Failed');
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
