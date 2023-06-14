<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Education\StoreEducation;
use App\Http\Requests\Education\UpdateEducation;

class ApiEducationController extends Controller
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
        $education = Education::whereUserId(auth_user()->id)->get();
        if (count($education) > 0) {
            return $this->sendResponse($education, 'Displaying all Education Records');
        }else{
            return $this->sendResponse($education, 'No Records Found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Show form to create new Education Record";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducation $request)
    {
        //i want to see your validations errors here (Shey you are the one that said to use Request)
        
        $input = $this->AddEducationRequest($request);
        $education = Education::create($input);
        if($education){
        $success['institution'] = $education->institution;
        return $this->sendResponse($success, "Added Successfully");
        }else{
            $this->sendError('Something went wrong with your input');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
        $education = User::find($userid)->education;
        if(count($education) > 0){
            return $this->sendResponse($education, 'Showing Education for '.User::find($userid)->name);
        }else{
            return $this->sendResponse('No Education', 'Nothing Found');
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
    public function update(UpdateEducation $request, $id)
    {
        $education = Education::find($id);

        if (!$education) {
            return $this->sendError('Not Found', ['error'=>'That Record Does not exist'], 404);
        }

        $education->institution = $request->institution;
        $education->qualification_id = $request->qualification_id;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->description = $request->description;

        if ($education->save()) {
            return $this->sendResponse(Education::find($id), 'Updated Successfully'); 
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
        $education = Education::find($id);
        
        if (!$education) {
            return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404);
        }
        
        $delete = Education::destroy($id);
            if ($delete) {
                return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
            }else{
                return $this->sendError('Failed !', ['error'=>'Failed'], 400);
            }
    }
}
