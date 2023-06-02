<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\CoverLetter;
use Illuminate\Http\Request;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CoverLetterController extends Controller
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
        $coverletter = CoverLetter::all();
        if(count($coverletter) > 0){
            return $this->sendResponse($coverletter, 'Showing Cover Letters');
        }else{
            return $this->sendError('Record Not Found', ['error'=>'Record Not Found'], 404);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['file']), [
            'file' => 'required|mimes:pdf,doc,docx,txt|max:2048',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
           
        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('uploads/coverletters/'), $fileName);

           $filedata = CoverLetter::create([
            'user_id' => auth()->user()->id,
            'doc_url' => 'uploads/cvs/'.$fileName,
        ]);
    
        return $this->sendResponse($filedata, 'Upload Completed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
        $coverletter = DB::table('cover_letters')->where('user_id', '=', $userid)->get();
        if(count($coverletter) > 0){
            return $this->sendResponse($coverletter, 'Showing CV for '.User::find($userid)->name);
        }else{
            return $this->sendError('Record Not Found', ['error'=>'Record Not Found'], 404);
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
        $coverletter = CoverLetter::find($id);
        if(!$coverletter){
            return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
        }
        
            if(File::exists(public_path($coverletter->doc_url))){
                File::delete(public_path($coverletter->doc_url));
              }
        if (CoverLetter::destroy($id)) {
            return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
        }else{
            return $this->sendError('Failed !', ['error'=>'Failed'], 400);
        }
    }
}
