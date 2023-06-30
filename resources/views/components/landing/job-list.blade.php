<section class="middle">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="text-muted mb-0">Recent Jobs</h6>
                    <h2 class="ft-bold">Recent Active <span class="theme-cl">Listed jobs</span></h2>
                </div>
            </div>
        </div>
        
        <!-- row -->
        <div class="row align-items-center">
            @foreach ($latestjobs as $job)
            @php
                $company = App\Models\Company::find($job->company_id);
            @endphp
            <!-- Single -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="jbr-wrap text-left border rounded">
                    <div class="cats-box mlb-res rounded bg-white d-flex align-items-center justify-content-between px-3 py-3">
                        <div class="cats-box rounded bg-white d-flex align-items-center">
                            <div class="text-center"><img src="{{asset($company->logo)}}" class="img-fluid" width="55" alt=""></div>
                            <div class="cats-box-caption px-2">
                                <h4 class="fs-md mb-0 ft-medium">Fresher UI/UX Designer (3 Year Exp.)</h4>
                                <div class="d-block mb-2 position-relative">
                                    <span class="text-muted medium"><i class="lni lni-map-marker mr-1"></i>Liverpool, London</span>
                                    <span class="muted medium ml-2 theme-cl"><i class="lni lni-briefcase mr-1"></i>Full Time</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mlb-last"><a href="job-detail.html" class="btn gray ft-medium apply-btn fs-sm rounded">Apply Job<i class="lni lni-arrow-right-circle ml-1"></i></a></div>
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