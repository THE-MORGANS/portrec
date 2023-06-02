<?php

namespace App\Http\Traits;


/**
 * 
 */
trait UserAuthTrait
{

      /**
     * success response method.
     *
     *
     * @return Illuminate\Http\Request
     * 
     */
    public function TraitRegisterUser($request){
        $data = [
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "password" => $request->password,
        ];
        return $data;
    }

}


?>