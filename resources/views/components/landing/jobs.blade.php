<!-- Job Section -->
    <section class="job-section-five style-two">
      <div class="auto-container">
        <div class="row wow fadeInUp">
          <div class="featured-column col-xl-9 col-lg-12 col-md-12 col-sm-12">
            <div class="sec-title">
              <h2>Featured Jobs</h2>
              <div class="text">Know your worth and find the job that qualify your life</div>
            </div>
            <div class="outer-box">
              @foreach ($jobs as $job)
                <!-- Job Block -->
              <div class="job-block-five">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/4-1.png" alt=""></span>
                    <h4><a href="#">{{$job->title}}</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> {{$job->qualifications}}</li>
                      <li><span class="icon flaticon-map-locator"></span> {{Str::limit($job->location, 10, '...')}}</li>

                      {{-- Calculate Number of days --}}
                      @php
                        $days = ceil((abs(time() - strtotime($job->created_at)))/60/60/24);
                      @endphp
                      <li><span class="icon flaticon-clock-3"></span> {{$days.' days ago'}}</li>

                      <li><span class="icon flaticon-money"></span> {{ number_format($job->min_salary) }} - {{number_format($job->max_salary)}}</li>
                    </ul>
                  </div>
                  <ul class="job-other-info">
                    <li class="time">{{ App\Models\WorkType::find($job->work_type_id)->name }}</li>
                  </ul>
                  <a href="#" class="theme-btn btn-style-eight">Apply Job</a>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <div class="recent-column col-xl-3 col-lg-12 col-md-12 col-sm-12">
            <div class="sec-title">
              <h2>Recent Jobs</h2>
              <div class="text">Know your worth and find the job</div>
            </div>

            @foreach ($latestjobs as $job)
                <!-- Job Block -->
            <div class="job-block-four">
              <div class="inner-box">
                <ul class="job-other-info">
                  <li class="time">{{ App\Models\WorkType::find($job->work_type_id)->name }}</li>
                </ul>
                <span class="company-logo"><img src="images/resource/company-logo/3-4.png" alt=""></span>
                <span class="company-name">{{ App\Models\Company::find($job->company_id)->name }}</span>
                <h4><a href="#">{{$job->title}}</a></h4>
                <div class="location"><span class="icon flaticon-map-locator"></span> {{Str::limit($job->location, 10, '...')}} </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <!-- End Job Section -->