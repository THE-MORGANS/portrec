<!-- ======================= Job List ======================== -->
<section class="middle">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-muted mb-0">Trending Jobs</h6>
                    <h2 class="ft-bold">All Popular Listed jobs</h2>
                </div>
            </div>
        </div>
        
        <!-- row -->
        <div class="row align-items-center">

            @foreach ($jobs as $job)
                 <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="job_grid border rounded ">
                    <div class="position-absolute ab-left"><button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></button></div>
                    <div class="position-absolute ab-right"><span class="medium theme-cl theme-bg-light px-2 py-1 rounded">Full Time</span></div>
                    <div class="job_grid_thumb mb-2 pt-5 px-3">
                        <a href="job-detail.html" class="d-block text-center m-auto"><img src="assets/img/c-1.png" class="img-fluid" width="70" alt="" /></a>
                    </div>
                    <div class="job_grid_caption text-center pb-3 px-3">
                        <h4 class="mb-0 ft-medium medium"><a href="job-detail.html" class="text-dark fs-md">UI/UX Web Designer</a></h4>
                        <div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>San Francisco</span></div>
                    </div>
                    <div class="job_grid_footer pb-4 px-3">
                        <ul class="p-0 skills_tag text-center">
                            <li><span class="px-2 py-1 medium skill-bg rounded text-dark">Joomla</span></li>
                            <li><span class="px-2 py-1 medium skill-bg rounded text-dark">WordPress</span></li>
                            <li><span class="px-2 py-1 medium skill-bg rounded text-dark">Javascript</span></li>
                            <li><span class="px-2 py-1 medium skill-bg rounded text-dark">PHP</span></li>
                            <li><span class="px-2 py-1 medium skill-bg rounded text-dark">HTML5</span></li>
                            <li><span class="px-2 py-1 medium theme-bg rounded text-light">+3 More</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        
           
            
        </div>
        <!-- row -->
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="position-relative text-center">
                    <a href="job-search-v1.html" class="btn btn-md theme-bg rounded text-light hover-theme">Explore More Jobs<i class="lni lni-arrow-right-circle ml-2"></i></a>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- ======================= Job List ======================== -->