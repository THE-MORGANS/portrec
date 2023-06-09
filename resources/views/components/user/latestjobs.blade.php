<div class="col-lg-12">
    <!-- applicants Widget -->
    <div class="applicants-widget ls-widget">
      
      <div class="widget-title">
        <h4>Latest Jobs</h4>
      </div>
      
      <div class="widget-content">
        <div class="row">
          
          @foreach ($jobs as $job)
            @php
              $appliedsince = ceil((abs(time() - strtotime($job->created_at)))/60/60/24);
            @endphp 
         <!-- Candidate block three -->
         <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
          <div class="inner-box">
            <div class="content">
              <figure class="image"><img src="https://uploads.turbologo.com/uploads/design/preview_image/1474061/preview_image20201021-12242-yijvzg.png" alt=""></figure>
              <h4 class="name"><a href="#">{{$job->title}}</a></h4>
              <ul class="candidate-info">
                <li class="designation">Posted: {{$appliedsince}} days ago</li>
                <li><span class="icon flaticon-map-locator"></span> {{$job->location}}</li>
                <li><span class="icon flaticon-money"></span> {{number_format($job->max_salary)}}</li>
              </ul>
              <small class="">Deadline: {{$job->deadline}}</small>
            </div>
            <div class="option-box">
              <ul class="option-list">
                <li><button data-text="View Aplication"><span class="la la-eye"></span></button></li>
                <li><button data-text="Delete Aplication"><span class="la la-trash"></span></button></li>
              </ul>
            </div>
          </div>
        </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>