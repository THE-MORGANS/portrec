<?php

namespace App\Http\Requests\Award;

use Illuminate\Foundation\Http\FormRequest;

class AddAward extends FormRequest
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
        return [
            'award_title' => 'required',
            'award_type' => 'required',
            'issue_date' => 'required',
        ];
    }
}
