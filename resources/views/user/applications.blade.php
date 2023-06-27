<x-user.layout>

    <!-- Dashboard -->
    <section class="ls-section">
  
      <div class="dashboard-outer">        
        <div class="upper-title-box">
          <h3> Job Applications </h3>
        </div>
  
  
      <div class="auto-container">
        <div class="filters-backdrop"></div>
  
        <div class="row">
  
          <!-- Content Column -->
          <div class="content-column col-lg-12 col-md-12 col-sm-12">
            <div class="ls-outer">
              <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>
  
              <!-- ls Switcher -->
              <div class="ls-switcher">
                <div class="showing-result">
                  <div class="text">Showing <strong>{{$applications->firstItem()}}-{{$applications->lastItem()}}</strong> of <strong>{{$applications->total()}}</strong> Jobs Applied</div>
                </div>
                
                <div class="sort-by">
                  <select class="chosen-select" style="display: none;">
                    <option>Show 10</option>
                    <option>Show 20</option>
                    <option>Show 30</option>
                    <option>Show 40</option>
                    <option>Show 50</option>
                    <option>Show 60</option>
                  </select>
                </div>
              </div>
  
              @if (count($applications) > 0)
              <div class="row">
                @foreach ($applications as $application)
                {{-- Get Company Info --}}
                @php
                  $job = App\Models\Job::find($application->job_id);
                  $company = App\Models\Company::find($job->company_id);
                @endphp
                     <!-- Company Block Four -->
                      <div class="company-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                          <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                          <span class="featured">Featured</span>
                          <span class="company-logo"><img src="{{$company->logo}}" alt="{{$company->name}}"></span>
                          <h4><a href="#">{{$job->title}}</a></h4>
                          <ul class="job-info">
                            <li><span class="icon flaticon-map-locator"></span> {{$job->location}}</li>
                            <li><i class="las la-coins"></i> {{ number_format($job->min_salary). " - ". number_format($job->max_salary)}}</li>
                          </ul>
                          <a href="mailto:{{$company->email}}" class="btn btn-sm btn-outline-primary">Follow Up</a>
                        </div>
                      </div>
                @endforeach
              </div>                  
              @else
                 <div class="row">
                  <div class="company-block-four col-xl-12 col-lg-12 col-md-12 col-sm-12 my-5">
                    <div class="inner-box py-5">
                      <h6 class="display-6 mb-5 text-danger">Oops! Seems You Have Not Applied for any Jobs.</h6>
                      <a href="{{route('dashboard.loadjobs')}}" class="btn btn-lg btn-outline-primary">Go To Jobs</a>
                    </div>
                  </div>
                  </div> 
              @endif
  
              <!-- Pagination -->
              <nav class="ls-pagination">
                {{ $applications->links() }}
              </nav>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- End Dashboard -->
  
    </x-user.layout>