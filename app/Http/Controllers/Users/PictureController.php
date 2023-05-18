<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\ProfilePicture;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PictureController extends Controller
{
    use ResponseTrait;
    
    public function uploadUserProfilePicture($id, Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:500',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $image_path = $request->file('image')->store('image', 'public');

        $data = ProfilePicture::create([
            'user_id' => $id,
            'image' => $image_path,
        ]);

        if ($data) {
            return $this->sendResponse($data, 'User Profile Picture Updated');
        }else{
            return $this->sendError('Failed Operation', ['error'=>'Image Upload Failed'], 400); 
        }
    }

}
