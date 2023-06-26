<?php

namespace App\Http\Controllers\Users;

use App\Models\CV;
use App\Models\Job;
use App\Models\User;
use App\Models\Award;
use App\Models\Education;
use App\Models\Portfolio;
use App\Models\Application;
use App\Models\Certificate;
use App\Models\CoverLetter;
use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use App\Models\ProfilePicture;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    // public $userprofilepicture;

    public function __construct()
    {
        // $this->userprofilepicture = ProfilePicture::with('user')->first();
    }

    public function index(){
        $user = Auth::user();
        $data['applications'] = Application::with('user')->get();
        $data['cv'] = CV::with('user')->get();
        $data['coverletter'] = CoverLetter::with('user')->get();
        $data['jobs'] = Job::all()->sortDesc()->take(4);
        // $data['userprofilepicture'] = ProfilePicture::with('user')->first();
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
        $data['workexperiences'] = User::find($userID)->workexperience;
        $data['educations'] = User::find($userID)->education;
        $data['awards'] = User::find($userID)->awards;
        $data['awardtypes'] = DB::table('award_types')->get();
        $data['portfolios'] = $this->getUserPortfolio($userID);
        return view('user.resume', $data);
    }

    public function loadCVPage(){
        $userID = Auth::user()->id;
        $data['cvs'] = User::find($userID)->cvs;
        return view('user.cv', $data);
    }

    
}
