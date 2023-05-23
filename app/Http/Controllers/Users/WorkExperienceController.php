<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkExperience\AddWorkExperience;
use App\Http\Requests\WorkExperience\UpdateWorkExperience;

class WorkExperienceController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workexperiences = WorkExperience::all();
        return $this->sendResponse($workexperiences, 'Displaying All Work Experience');
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
    public function store(AddWorkExperience $request)
    {
        $input = $request->all();    
        $workexperience = WorkExperience::create($input);
        $success['jobtitle'] =  $workexperience->job_title; //what is this here?
   
        return $this->sendResponse($success, 'Added Successfully.');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
        $workexperiences = User::find($userid)->workexperience;
        if(count($workexperiences) > 0){
            return $this->sendResponse($workexperiences, 'Showing Work Experience for '.User::find($userid)->name);
        }else{
            return $this->sendResponse('No Work Experience', 'Nothing Found');
        }
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
    public function update(UpdateWorkExperience $request, $id)
    {
        $workexperience = WorkExperience::find($id);

        if (!$workexperience) {
            return $this->sendError('Not Found', ['error'=>'That Record Does not exist'], 404);
        }

        $workexperience->company_name = $request->company_name;
        $workexperience->company_location = $request->company_location;
        $workexperience->start_date = $request->start_date;
        $workexperience->end_date = $request->end_date;
        $workexperience->job_title = $request->job_title;
        $workexperience->job_level = $request->job_level;
        $workexperience->salary_range = $request->salary_range;
        $workexperience->description = $request->description;
        $workexperience->status = $request->status;

        if ($workexperience->save()) {
            return $this->sendResponse(WorkExperience::find($id), 'Updated Successfully');  
        }else{
            return $this->sendError('Failed !', ['error'=>'Failed'], 400); 
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $workexperience = WorkExperience::find($id);
    
    if(!$workexperience){
        return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
    }

    $delete = WorkExperience::destroy($id);
    if ($delete) {
        return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
    }else{
        return $this->sendError('Failed !', ['error'=>'Failed'], 400);
    }
  
    }
}
