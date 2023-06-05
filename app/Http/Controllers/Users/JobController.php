<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CV;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{

    use ResponseTrait;
    use RequestTrait;

    
    public function __construct(){

    }

    public function getAllJobs(){
        $jobs = Job::all();
        if (count($jobs) > 0) {
            return $this->sendResponse($jobs, 'Displaying all Job Records');
        }else{
            return $this->sendError('Record Not Found', ['error'=>'Record Not Found'], 404);
        }
    }

    public function getJobById($id){
        $job = Job::find($id);
        if ($job) {
            return $this->sendResponse($job, 'Displaying Job Record');
        }else{
            return $this->sendError('Record Not Found', ['error'=>'Record Not Found'], 404);
        }
    }

    public function applyForJob(Request $request, $jobid){
        $job = Job::find($jobid);
        if (!$job) {
            return $this->sendError('Record Not Found', ['error'=>'Record Not Found'], 404);
        } 
        $userid = auth()->user()->id;
        $cv = DB::table('cv')->where('user_id', '=', $userid)->first();
        $coverletter = DB::table('cover_letters')->where('user_id', '=', $userid)->first();
        $portfolio = DB::table('portfolios')->where('user_id', '=', $userid)->get();
        $data = [
            'user_id' => $userid,
            'job_id' => $job->id,
            'cv_id' => $cv->id,
            'cover_letter_id' => $coverletter->id,
            'portfolio_links' => 'https://images.pexels.com/photos/989917/pexels-photo-989917.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'hiring_stage_id' => 1,
            'applied_date' => Carbon::now()->toDateTimeString(),
            'status' => 1,
            'answers' => null,
            'is_viewed' => false,
        ];

        $application = Application::create($data);

        return $this->sendResponse($application, 'Applied Successfully.');
    }

    public function deleteJobApplication($appid) { //appid is application id
        $application = Application::find($appid);
        if(!$application){
            return $this->sendError('Record Doesn\'t Exist', ['error'=>'Record Not Found'], 404); 
        }
        if (Application::destroy($appid)) {
            return $this->sendResponse('Deleted Successfully', 'Record was Deleted'); 
        }else{
            return $this->sendError('Failed !', ['error'=>'Failed'], 400);
        }
    }


}
