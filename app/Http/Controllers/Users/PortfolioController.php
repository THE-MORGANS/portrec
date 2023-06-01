<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Portfolio;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Portfolio\AddPortfolio;
use App\Http\Requests\Portfolio\UploadImage;

class PortfolioController extends Controller
{
    use ResponseTrait;
    use RequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Load all Portfolios in Database
    public function index()
    {
        $portfolios = Portfolio::all(); //Get all Portfolios
        // $portfolios = Portfolio::whereUserId(Auth::user()->id)->get();
        if (count($portfolios) > 0) {
            return $this->sendResponse($portfolios, 'Displaying All Portfolios');
        }else{
            return $this->sendResponse($portfolios, 'No Records Found');
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
    public function store(AddPortfolio $request)
    {
        //Use image intervention
        $input = $this->AddPortfolio($request); 
        $portfolio = Portfolio::create($input);  
        if($request->hasFile('images'))
        {
            $imagearray = $request->file('images');
           foreach($imagearray as $image)
           {
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = 'uploads/portfolios/' . $image_name;
            Image::make($image)->resize(500, 500)->save(public_path($image_path));
            $data = PortfolioImage::create([
                'image_url' => $image_path,
                'portfolio_id' => $portfolio->id,
                'user_id' => Auth::user()->id,
            ]);
           }
        }
        $success['projecttitle'] =  $portfolio->project_title; 
   
        return $this->sendResponse($success, 'Added Successfully.');
    }

    //To upload an image for a specific portfolio
    public function uploadPortfolioImage(UploadImage $request, $id){
        $portfolio = Portfolio::find($id);
        if (!$portfolio) {
            return $this->sendError('Not Found', ['error'=>'That Record Does not exist'], 404); 
        }

        $file = $request->file('images');
        foreach ($file as $image) {
            $image_name = uniqid(). '.'. $image->getClientOriginalExtension();
            $image_path = 'uploads/portfolios/'. $image_name;
            Image::make($image)->resize(500, 500)->save(public_path($image_path));
            $data = PortfolioImage::create([
                'image_url' => $image_path,
                'portfolio_id' => $id,
                'user_id' => Auth::user()->id,
            ]);
        }
        return $this->sendResponse('Upload Completed Successfully', 'Upload Completed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Get Details of a Particular Portfolio
    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        if($portfolio){
            $portfolioimages = Portfolio::find($portfolio->id)->portfolioimages;
            $portfolio['images'] = $portfolioimages;
            return $this->sendResponse($portfolio, 'Showing Portfolio Detail');
        }else{
            return $this->sendError('Not Found', ['error'=>'That Record Does not exist'], 404);
        }
    }

    //get Portfolio Specific to User
    public function getUserPortfolios($userid){
        $portfolios = User::find($userid)->portfolios;
        if(count($portfolios) > 0){
            foreach($portfolios as $portfolio){
                $portfolioimages = Portfolio::find($portfolio->id)->portfolioimages;
                $portfolio['images'] = $portfolioimages;
            }
            return $this->sendResponse($portfolios, 'Showing Portfolio for '.User::find($userid)->name);
        }else{
            return $this->sendError('No Records Found', ['error'=>'Nothing to Display'], 404);
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
        $portfolio = Portfolio::find($id);

        if (!$portfolio) {
            return $this->sendError('Not Found', ['error'=>'That Record Does not exist'], 404);
        }

        $portfolio->project_title = $request->project_title;
        $portfolio->project_role = $request->project_role;
        $portfolio->project_task = $request->project_task;
        $portfolio->project_solution = $request->project_solution;

        if ($portfolio->save()) {
            return $this->sendResponse(Portfolio::find($id), 'Updated Successfully');  
        }else{
            return $this->sendError('Failed !', ['error'=>'Failed'], 400); 
        } 
        //TODO: There has to be a seperate function to upload images while updating portfolio
    }

    //This is to delete a particular portfolio Image
    public function deletePortfolioImage($id){
        $image = PortfolioImage::find($id);
        if(!$image){
            return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
        }
        
            if(File::exists(public_path($image->image_url))){
                File::delete(public_path($image->image_url));
              }
        if (PortfolioImage::destroy($id)) {
            return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
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
    // This is to delete a Portfolio with all it's images
    public function destroy($id){
        $portfolio = Portfolio::find($id);
    if(!$portfolio){
        return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
    }
    $imagestodelete = DB::table('portfolio_images')->where('portfolio_id', '=', $id)->get();
    
    foreach ($imagestodelete as $img) {
        if(File::exists(public_path($img->image_url))){
            File::delete(public_path($img->image_url));
          }
    }
    DB::table('portfolio_images')->where('portfolio_id', '=', $id)->delete();
    
    if (Portfolio::destroy($id)) {
        return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
    }else{
        return $this->sendError('Failed !', ['error'=>'Failed'], 400);
    }

    }

}
