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
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Portfolio\AddPortfolio;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::all();
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
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
		    $constraint->aspectRatio();
		});
            $image_path = $imgFile->store('image', 'public');
            $data = PortfolioImage::create([
                'image_url' => $image_path,
                'portfolio_id' => $portfolio->id,
                'user_id' => Auth::user()->id,
            ]);
           }
        }
        $success['projecttitle'] =  $portfolio->project_title; //what is this here?
   
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
        $portfolio = Portfolio::find($id);
        if($portfolio){
            $portfolioimages = Portfolio::find($portfolio->id)->portfolioimages;
            $portfolio['images'] = $portfolioimages;
            return $this->sendResponse($portfolio, 'Showing Portfolio Detail');
        }else{
            return $this->sendResponse('No Records', 'Nothing Found');
        }
    }

    public function getUserPortfolios($userid){
        $portfolios = User::find($userid)->portfolios;
        if(count($portfolios) > 0){
            foreach($portfolios as $portfolio){
                $portfolioimages = Portfolio::find($portfolio->id)->portfolioimages;
                $portfolio['images'] = $portfolioimages;
            }
            return $this->sendResponse($portfolios, 'Showing Portfolio for '.User::find($userid)->name);
        }else{
            return $this->sendResponse('No Records', 'Nothing Found');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $portfolio = Portfolio::find($id);
    if(!$portfolio){
        return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
    }
    $imagestodelete = DB::table('portfolio_images')->where('portfolio_id', '=', $id)->get();
    
    foreach ($imagestodelete as $img) {
        if(Storage::exists($img->image_url)){
            Storage::delete($img->image_url);
          }
    }

    $deleteimages = DB::table('portfolio_images')->where('portfolio_id', '=', $id)->delete();
    if ($deleteimages) {
        $delete = Portfolio::destroy($id);
    }

    if ($delete) {
        return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
    }else{
        return $this->sendError('Failed !', ['error'=>'Failed'], 400);
    }

    }

}
