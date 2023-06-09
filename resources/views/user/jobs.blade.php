<x-user.layout>
    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">        
        <div class="upper-title-box">
          <h3> Jobs </h3>
        </div>

        <div class="row">

          <div class="row">
            <div class="col-lg-12">
              <!-- Ls widget -->
              <div class="ls-widget">
                <div class="tabs-box">
                  <div class="widget-title">
                    <h4>All Jobs</h4>
                  </div>
  
                  <div class="widget-content">
                    <div class="table-outer">
                      <table class="default-table manage-job-table">
                        <thead>
                          <tr>
                            <th>Job Title</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
  
                        <tbody>
                          
                          @foreach ($jobs as $job)
                          <tr>
                            <td>
                              <!-- Job Block -->
                              <div class="job-block">
                                <div class="inner-box">
                                  <div class="content">
                                    <span class="company-logo"><img src="images/resource/company-logo/1-1.png" alt=""></span>
                                    <h4><a href="#">{{$job->title}}</a></h4>
                                    <ul class="job-info">
                                      <li><span class="icon flaticon-briefcase"></span> {{$job->term}}</li>
                                      <li><span class="icon flaticon-map-locator"></span> {{$job->location}}</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>{{gmdate("M d, Y", strtotime($job->created_at)) }}</td>
                            <td class="status">Active</td>
                            <td>
                              <div class="option-box">
                                <ul class="option-list">
                                  <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                                  <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            

            <nav aria-label="Result Navigation">
              <ul class="pagination justify-content-end">
                {{ $jobs->links() }}
              </ul>
            </nav>

  
          </div>
        
        </div>
  
  
      </div>
    </section>
    <!-- End Dashboard -->
  </x-user.layout>