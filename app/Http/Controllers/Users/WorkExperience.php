<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\WorkExperience as UserWorkExperience;   #****** please remove the alias and call the request directory on ur controller,
                                                                //  try name other classes simmilar and not the same****
use App\Models\WorkExperience as ModelsWorkExperience; #****** please remove the alias and call the models directory on ur controller ****
use Illuminate\Http\Request;
use App\Trait\ExperienceInput;
class WorkExperience extends Controller
{
    use ExperienceInput;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Show all Work Experience";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Show form to create new Work Experience";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserWorkExperience $request)
    {
        $input = $this->ExperienceInput($request->all());    
        $workexperience = ModelsWorkExperience::create($input);
        $success['jobtitle'] =  $workexperience->job_title; //what is this?
   
        return $this->sendResponse($success, 'Added Successfully.');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
