<x-user.layout>

  <!-- Dashboard -->
  <section class="ls-section">

    <div class="dashboard-outer">        
      <div class="upper-title-box">
        <h3> Jobs </h3>
      </div>

    {{-- Search Form  --}}

    <div class="auto-container">
      <!-- Job Search Form -->
      <div class="job-search-form">
        <form method="post" action="https://creativelayers.net/themes/superio/job-list-v10.html">
          <div class="row">
            <!-- Form Group -->
            <div class="form-group col-lg-4 col-md-12 col-sm-12">
              <span class="icon flaticon-search-1"></span>
              <input type="text" name="field_name" placeholder="Job title, keywords, or company">
            </div>

            <!-- Form Group -->
            <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
              <span class="icon flaticon-map-locator"></span>
              <input type="text" name="field_name" placeholder="City or postcode">
            </div>

            <!-- Form Group -->
            <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
              <span class="icon flaticon-briefcase"></span>
              <select class="chosen-select" style="display: none;">
                <option value="">All Categories</option>
                <option value="44">Accounting / Finance</option>
                <option value="106">Automotive Jobs</option>
                <option value="46">Customer</option>
                <option value="48">Design</option>
                <option value="47">Development</option>
                <option value="45">Health and Care</option>
                <option value="105">Marketing</option>
                <option value="107">Project Management</option>
              </select>
            </div>

            <!-- Form Group -->
            <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
              <button type="submit" class="theme-btn btn-style-one">Find Jobs</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Job Search Form -->
    </div>

    {{-- Search Form  --}}


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
                <div class="text">Showing <strong>{{$jobs->firstItem()}}-{{$jobs->lastItem()}}</strong> of <strong>{{$jobs->total()}}</strong> Available Jobs</div>
              </div>
              
              <div class="sort-by">
                <select class="chosen-select" style="display: none;">
                  <option>New Jobs</option>
                  <option>Freelance</option>
                  <option>Full Time</option>
                  <option>Internship</option>
                  <option>Part Time</option>
                  <option>Temporary</option>
                </select>

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


            <div class="row">
              @foreach ($jobs as $job)
              {{-- Get Company Info --}}
              @php
                $company = App\Models\Company::find($job->company_id);
              @endphp
                   <!-- Company Block Four -->
                    <div class="company-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                      <div class="inner-box">
                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                        <span class="featured">Featured</span>
                        <span class="company-logo"><img src="{{$company->logo}}" alt="{{$company->name}}"></span>
                        <h4><a href="#">{{$job->title}}{{$job->id}}</a></h4>
                        <ul class="job-info">
                          <li><span class="icon flaticon-map-locator"></span> {{$job->location}}</li>
                          <li><i class="las la-coins"></i> {{ number_format($job->min_salary). " - ". number_format($job->max_salary)}}</li>
                        </ul>
                        <a href="#" class="btn btn-sm btn-outline-primary">Apply Now</a>
                      </div>
                    </div>
              @endforeach

            </div>

            <!-- Pagination -->
            <nav class="ls-pagination">
              {{ $jobs->links() }}
            </nav>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- End Dashboard -->

  </x-user.layout>