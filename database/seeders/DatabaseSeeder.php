<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use App\Models\Company;
use App\Models\Recruiter;
use App\Models\WorkType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        WorkType::factory(3)->sequence(
            ["name"=> "Full Time", "status"=> "1"],
            ["name"=> "Remote", "status"=> "2"],
            ["name"=> "Contract", "status"=> "3"]
        )->create();
        
        Recruiter::factory()->count(9)->create();
        Company::factory()->count(9)->create();
        Job::factory()->count(50)->create();

    }
}
