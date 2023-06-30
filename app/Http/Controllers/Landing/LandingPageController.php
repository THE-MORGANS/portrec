<?php

namespace App\Http\Controllers\Landing;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Industry;

class LandingPageController extends Controller
{
    public function loadLandingPage(){
        // $data['jobs'] = Job::all()->sortDesc()->skip(4)->take(6);
        $data['latestjobs'] = Job::all()->sortDesc()->take(6);
        $data['jobs'] = Job::all()->sortDesc()->skip(6)->take(12);
        $data['industries'] = Industry::all()->sortDesc()->take(12);
        // dd($data);
        return view('landing.landing', $data);
    }

    public function loadAboutPage(){
        return view('landing.about');
    }

    public function loadContactPage(){
        return view('landing.contact');
    }
}
