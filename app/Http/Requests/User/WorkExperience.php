<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperience extends FormRequest
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
            'user_id' => 'required',
            'company_name' => 'required',
            'company_location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_title' => 'required',
            'job_level' => 'required',
            'industries_id' => 'required',
            'job_function_id' => 'required',
            'salary_range' => 'required',
            'work_type_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }
}
