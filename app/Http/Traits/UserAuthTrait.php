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
                "name" => $request->fullname,
                "email" => $request->email,
                "password" => $request->password,
        ];
        return $data;
    }

}


?>