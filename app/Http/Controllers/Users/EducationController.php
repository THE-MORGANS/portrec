<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Education\StoreEducation;
use App\Http\Requests\Education\UpdateEducation;

class EducationController extends Controller
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
        $input = $this->AddEducationRequest($request);
        $education = Education::create($input);
        if($education){
            return back()->with('success', 'Education Record Added Successfully');
        }else{
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['education'] = Education::find($id);
        return view('user.editeducation', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['education'] = Education::find($id);
        return view('user.editeducation', $data);
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
            return back()->with('error', 'Record Not Found');
        }

        $education->institution = $request->institution;
        $education->qualification = $request->qualification;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->description = $request->description;

        if ($education->save()) {
            return Redirect::to('resume')->with('success', 'Record Updated Successfully');
            // return $this->sendResponse(Education::find($id), 'Updated Successfully'); 
        }else{
            return back()->with('error', 'Record Updated Failed');
            // return $this->sendError('Failed !', ['error'=>'Failed'], 400); 
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
            return back()->with('error', 'No Record Found');
        }
        $delete = Education::destroy($id);
            if ($delete) {
                return back()->with('info', 'Deleted Successfully');
            }
    }
}
