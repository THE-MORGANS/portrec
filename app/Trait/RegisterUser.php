<?php 
namespace App\Trait;

trait RegisterUser {

    public function Register($request){

        return [
            'email' => $request->email,
            'phone' => $request->phone

        ];

    }


}


