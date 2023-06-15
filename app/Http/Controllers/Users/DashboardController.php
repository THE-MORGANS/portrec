<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CoverLetter;
use App\Models\CV;
use App\Models\Education;
use App\Models\Job;
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

    public function loadResumePage(){
        $data['cv'] = CV::first();
        $data['workexperiences'] = WorkExperience::all();
        $data['educations'] = Education::all();
        return view('user.resume', $data);
    }

    public function loadCVPage(){
        $data['cv'] = CV::first();
        return view('user.cv', $data);
    }

    
}
