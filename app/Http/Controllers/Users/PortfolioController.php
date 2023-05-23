<?php

//There are issues with this controller.
//I am trying to upload multiple images at once, and it is not working, maybe you can look at it. I am sure I am missing something.

//Ignore the Auth::user(), I will come back to that.
//I just had to push asap cos of gen

namespace App\Http\Controllers\Users;

use App\Models\User;
use Nette\Utils\Image;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Portfolio\AddPortfolio;
use Hamcrest\Arrays\IsArray;

class PortfolioController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return $this->sendResponse($portfolios, 'Displaying All Portfolios');
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
        $input = $request->all(); 
        $portfolio = Portfolio::create($input);  
        if($request->hasFile('images'))
        {
            $imagearray = $request->file('images');
           foreach($imagearray as $image)
           {
            $image_path = $image->store('image', 'public');
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
