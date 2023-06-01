<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $data = [
            'user_id' => "required", 
            'institution' => "required", 
            'qualification_id' => "required", 
            'start_date' => "required", 
            'end_date' => "required", 
            'description' => "required", 
        ];

        return $data;
    }
}
