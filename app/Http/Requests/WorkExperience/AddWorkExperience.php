<?php

namespace App\Http\Requests\WorkExperience;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkExperience extends FormRequest
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
            'company_name' => 'required',
            'company_location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_title' => 'required',
            'job_level' => 'required',
            'salary_range' => 'required',
            'description' => 'required',
            'status' => 'required|numeric',
        ];
    }
}
