<x-user.layout>

    <!-- Dashboard -->
    <section class="ls-section">
  
        <div class="dashboard-outer">        
          <div class="upper-title-box">
            <h3> Companies </h3>
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
                    <div class="text">Showing <strong>{{$companies->firstItem()}}-{{$companies->lastItem()}}</strong> of <strong>{{$companies->total()}}</strong> Companies</div>
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
    
                @if (count($companies) > 0)
                <div class="row">
                  @foreach ($companies as $company)
                  {{-- Get Company Info --}}
                       <!-- Company Block Four -->
                        <div class="company-block-four col-xl-3 col-lg-4 col-md-6 col-sm-12">
                          <div class="inner-box">
                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                            <span class="featured">Featured</span>
                            <span class="company-logo"><img src="{{$company->logo}}" alt="{{$company->name}}"></span>
                            <h4><a href="#">{{$company->name}}</a></h4>
                            <ul class="job-info">
                              <li><span class="icon flaticon-map-locator"></span> {{$company->phone}}</li>
                              <li><i class="las la-coins"></i> {{ $company->address}}</li>
                            </ul>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Company Profile</a>
                          </div>
                        </div>
                  @endforeach
                </div>                  
                @else
                   <div class="row">
                    <div class="company-block-four col-xl-12 col-lg-12 col-md-12 col-sm-12 my-5">
                      <div class="inner-box py-5">
                        <h6 class="display-6 mb-5 text-danger">Oops! Nothing Found.</h6>
                        <a href="{{route('dashboard.loadjobs')}}" class="btn btn-lg btn-outline-primary">Go To Jobs</a>
                      </div>
                    </div>
                    </div> 
                @endif
    
                <!-- Pagination -->
                <nav class="ls-pagination">
                  {{ $companies->links() }}
                </nav>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
    <!-- End Dashboard -->
  
    </x-user.layout>