<?php

namespace App\Http\Controllers\Landing;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function loadLandingPage(){
        $data['jobs'] = Job::all()->sortDesc()->skip(2)->take(5);
        $data['latestjobs'] = Job::all()->sortDesc()->take(2);
        // dd($data);
        return view('landing.landing', $data);
    }
}
