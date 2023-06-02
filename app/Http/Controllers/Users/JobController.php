<?php

namespace App\Http\Controllers\Users;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Traits\RequestTrait;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Carbon\Carbon;

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

        $data = [
            'user_id' => $userid,
            'job_id' => $job->id,
            'cv_id' => null,
            'cover_letter_id' => null,
            'portfolio_links' => null,
            'hiring_stage_id' => 1,
            'applied_date' => Carbon::now()->toDateTimeString(),
            'status' => 1,
            'answers' => null,
            'is_viewed' => false,
        ];

        $application = Application::create($data);

        return $this->sendResponse($application, 'Applied Successfully.');
    }


}
