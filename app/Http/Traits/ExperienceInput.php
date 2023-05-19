<?php 
namespace App\Trait;

trait ExperienceInput {


    public function InputExperience($request){

        $data = [
            'user_id' => auth_user(),
            'company_name' => $request->company_name,
            'company_location' => $request->company_location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'job_title' => $request->job_title,
            'job_level' => $request->job_level,
            'industries_id' => $request->industries_id,
            'job_function_id' => $request->job_function_id,
            'salary_range' => $request->salary_range,
            'work_type_id' => $request->work_type_id,
            'description' => $request->description,
            'status' => $request->status, 
        ];
        return $data;

    }


}