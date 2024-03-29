<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class AddPortfolio extends FormRequest
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
            'project_title' => 'required', 
            'project_role' => 'required', 
            'project_task' => 'required', 
            'project_solution' => 'required',
            'project_url' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500' 
        ];
    }
}
