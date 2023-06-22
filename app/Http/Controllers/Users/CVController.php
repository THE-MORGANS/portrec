<?php

namespace App\Http\Controllers\Users;

use App\Models\CV;
use App\Models\User;
use Spatie\PdfToImage\Pdf;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CVController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cv = CV::all();
        if(count($cv) > 0){
            return $this->sendResponse($cv, 'Showing CV');
        }else{
            return $this->sendError('Record Not Found', ['error'=>'Record Not Found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->('cv'));
        $validator = Validator::make($request->all(), [
            'cv' => 'required|mimes:pdf|max:1024',
        ]);

        // dd();
        if($validator->fails()){
            return back()->withErrors($validator)->with('error', 'CV Upload Error');       
        }
        $file = $request->file('cv');
        $fileName = time().'.'.$file->extension();  
        $file->move(public_path('uploads/cvs/'), $fileName);

        // $cvfile = new Pdf(public_path('uploads/cvs/'), $fileName);
        // $cvfile->saveImage(public_path('uploads/cvs/thumbnails'), $fileName);

        CV::create([
            'user_id' => auth()->user()->id,
            'doc_name' => $file->getClientOriginalName(),
            'doc_url' => 'uploads/cvs/'.$fileName,
        ]);
    
        return Redirect::to('cv')->with('success', 'CV Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
        $cv = DB::table('cv')->where('user_id', '=', $userid)->get();
        if(count($cv) > 0){
            return $this->sendResponse($cv, 'Showing CV for '.User::find($userid)->name);
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
        $cv = CV::find($id);
        if(!$cv){
            return back()->with('error', 'No Record Found'); 
        }
        
            if(File::exists(public_path($cv->doc_url))){
                File::delete(public_path($cv->doc_url));
              }
        if (CV::destroy($id)) {
            return back()->with('info', 'Deleted Successfully'); 
        }else{
            return back()->with('error', 'That Failed, Please Try Again');
    }}
}
