<x-user.layout>

  <div class="dashboard-tlbar d-block mb-5">
    <div class="row">
      <div class="colxl-12 col-lg-12 col-md-12">
        <h1 class="ft-medium">Jobs</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="theme-cl">Jobs</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="dashboard-widg-bar d-block">
    <div class="container">
      <div class="row">
        <!-- Item Wrap Start -->
        <div class="col-lg-9 col-md-12 col-sm-12">
          
          <section class="py-2 br-bottom br-top bg-dark">
            <div class="container">
              <div class="row align-items-center justify-content-between">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <span class="text-white">
                    Showing <strong>{{$jobs->firstItem()}} - {{$jobs->lastItem()}}</strong> of <strong>{{$jobs->total()}}</strong> Available Jobs
                  </span>
                </div>
              </div>
              
            </div>
          </section>

          <!-- row -->
          <div class="row align-items-center">

            @foreach ($jobs as $job)
            {{-- Get Company Info --}}
            @php
              $company = App\Models\Company::find($job->company_id);
            @endphp

            <!-- Single -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="job_grid border rounded ">
                <div class="position-absolute ab-left"><button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></button></div>
                <div class="position-absolute ab-right"><span class="medium theme-cl theme-bg-light px-2 py-1 rounded">{{App\Models\WorkType::find($job->work_type_id)->name}}</span></div>
                <div class="job_grid_thumb mb-2 pt-5 px-3">
                  <a href="job-detail.html" class="d-block text-center m-auto"><img src="{{$company->logo}}" class="img-fluid" width="70" alt="{{$company->name}}"></a>
                </div>
                <div class="job_grid_caption text-center pb-3 px-3">
                  <h4 class="mb-0 ft-medium medium"><a href="job-detail.html" class="text-dark fs-md">{{$job->title}}</a></h4>
                  <div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>{{$job->location}}</span></div>
                </div>
                <div class="job_grid_footer pb-4 px-3 text-center">
                  <span>
                    <i class="fa-regular fa-money-bill-1"></i> : {{ number_format($job->min_salary) }} - {{ number_format($job->max_salary) }} </span>
                    <hr />
                    <a href="#" class="btn btn-sm theme-bg text-light rounded"> Apply </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- row -->
          
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <ul class="pagination">
                {{ $jobs->links() }}
              </ul>
            </div>
          </div>
          
        </div>

        <div class="col-lg-3 col-md-12 col-sm-12">
          <div class="bg-white rounded mb-4">							
          
            <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
              <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
              <div class="ssh-header">
                <a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
                <a href="#search_open" data-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
              </div>
            </div>
            
            <!-- Find New Property -->
            <div class="sidebar-widgets collapse miz_show" id="search_open" data-parent="#search_open">
              
              <div class="search-inner">
                
                <div class="filter-search-box px-4 pt-3 pb-0">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search by keywords...">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Location, Zip..">
                  </div>
                </div>
                
                <div class="filter_wraps">
                  
                  <!-- Job categories Search -->
                  <div class="single_search_boxed px-4 pt-0 br-bottom">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#categories" class="ft-medium fs-md pb-0" data-toggle="collapse" aria-expanded="true" role="button">Job Industries</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse show" id="categories" data-parent="#categories">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="a6" class="checkbox-custom" name="Pet" type="checkbox">
                                  <label for="a6" class="checkbox-custom-label">Writing &amp; Translation (04)</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Job Locations Search -->
                  <div class="single_search_boxed px-4 pt-0 br-bottom">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#locations" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed">Job Locations</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse" id="locations" data-parent="#locations">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="b1" class="checkbox-custom" name="ADA" type="checkbox" checked="">
                                  <label for="b1" class="checkbox-custom-label">Australia (21)</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Job Skills Search -->
                  <div class="single_search_boxed px-4 pt-0 br-bottom">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#skills" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed">Skills</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse" id="skills" data-parent="#skills">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="c1" class="checkbox-custom" name="ADA" type="checkbox" checked="">
                                  <label for="c1" class="checkbox-custom-label">Administrative (15)</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Experience Search -->
                  <div class="single_search_boxed px-4 pt-0 br-bottom">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#experience" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed">Experience</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse" id="experience" data-parent="#experience">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="d7" class="checkbox-custom" name="Beauty" type="checkbox">
                                  <label for="d7" class="checkbox-custom-label">10+ Year (32)</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Job types Search -->
                  <div class="single_search_boxed px-4 pt-0 br-bottom">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#jbtypes" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed">Job Type</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse" id="jbtypes" data-parent="#jbtypes">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="e6" class="radio-custom" name="jtype" type="radio">
                                  <label for="e6" class="radio-custom-label">Regular</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Job Level Search -->
                  <div class="single_search_boxed px-4 pt-0 br-bottom">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#jblevel" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed">Job Level</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse" id="jblevel" data-parent="#jblevel">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="f4" class="checkbox-custom" name="Coffee" type="checkbox">
                                  <label for="f4" class="checkbox-custom-label">Senior</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Expected Salary Search -->
                  <div class="single_search_boxed px-4 pt-0">
                    <div class="widget-boxed-header">
                      <h4>
                        <a href="#salary" data-toggle="collapse" aria-expanded="false" role="button" class="ft-medium fs-md pb-0 collapsed">Expected Salary</a>
                      </h4>
                      
                    </div>
                    <div class="widget-boxed-body collapse" id="salary" data-parent="#salary">
                      <div class="side-list no-border">
                        <!-- Single Filter Card -->
                        <div class="single_filter_card">
                          <div class="card-body p-0">
                            <div class="inner_widget_link">
                              <ul class="no-ul-list filter-list">
                                <li>
                                  <input id="g6" class="checkbox-custom" name="Pet" type="checkbox">
                                  <label for="g6" class="checkbox-custom-label">$250k - $300k PA</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                <div class="form-group filter_button pt-2 pb-4 px-4">
                  <button type="submit" class="btn btn-md theme-bg text-light rounded full-width">22 Results Show</button>
                </div>
              </div>							
            </div>
          </div>
          <!-- Sidebar End -->
        
        </div>
        
      </div>
    </div>
  </div>

  </x-user.layout>