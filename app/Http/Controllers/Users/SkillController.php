<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\AddSkill;

class SkillController extends Controller
{
    use ResponseTrait;
    use RequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        if (count($skills) > 0) {
            return $this->sendResponse($skills, 'Displaying all Skill Records');
        }else{
            return $this->sendResponse($skills, 'No Records Found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSkill $request)
    {
        $input = $this->AddSkillRequest($request);
        $skill = Skill::create($input);
        $success['skill'] =  $skill->job_title;

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
        $skills = User::find($userid)->skills;
        if(count($skills) > 0){
            return $this->sendResponse($skills, 'Showing Skill for '.User::find($userid)->name);
        }else{
            return $this->sendResponse('No Skills', 'Nothing Found');
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
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return $this->sendError('Not Found', ['error'=>'That Record Does not exist'], 404);
        }

        $skill->name = $request->name;
        $skill->slug = $request->slug;

        if ($skill->save()) {
            return $this->sendResponse(Skill::find($id), 'Updated Successfully');  
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
        $skill = Skill::find($id);
    
    if(!$skill){
        return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
    }

    $delete = Skill::destroy($id);
    if ($delete) {
        return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
    }else{
        return $this->sendError('Failed !', ['error'=>'Failed'], 400);
    }
    }
}
