<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Award;
use App\Models\Certificate;
use App\Models\CoverLetter;
use App\Models\CV;
use App\Models\Education;
use App\Models\Job;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data['applications'] = Application::with('user')->get();
        $data['cv'] = CV::with('user')->get();
        $data['coverletter'] = CoverLetter::with('user')->get();
        $data['jobs'] = Job::all()->sortDesc()->take(4);
        // dd($data);
        return view('user.dashboard', $data);
    }

    public function loadJobsPage(){
        $data['jobs'] = Job::latest()->paginate(10);
        return view('user.jobs', $data);
    }

    public function getUserPortfolio($id){
        $userportfolios = User::find($id)->portfolios;
        if($userportfolios){
            $portfolios = [];
            foreach ($userportfolios as $portfolio) {
                $portfolioimages = Portfolio::find($portfolio->id)->portfolioimages;
                $portfolio['images'] = $portfolioimages;
                array_push($portfolios, $portfolio);   
            }
            return $portfolios;
        }else{
            return null;
        }
    }

    public function loadResumePage(){
        $userID = Auth::user()->id;
        $data['cv'] = CV::first();
        $data['workexperiences'] = User::find($userID)->workexperience;
        $data['educations'] = User::find($userID)->education;
        $data['awards'] = User::find($userID)->awards;
        $data['awardtypes'] = DB::table('award_types')->get();
        $data['portfolios'] = $this->getUserPortfolio($userID);
        return view('user.resume', $data);
    }

    public function loadCVPage(){
        $data['cv'] = CV::first();
        return view('user.cv', $data);
    }

    
}
