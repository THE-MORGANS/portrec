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
            'industries_id' => 'required|numeric',
            'job_function_id' => 'required|numeric',
            'salary_range' => 'required',
            'work_type_id' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|numeric',
        ];
    }
}
