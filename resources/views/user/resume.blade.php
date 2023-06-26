<x-user.layout>
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3> Resume </h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>My Profile</h4>
                            </div>

                            <div class="widget-content">
                                {{-- <form class="default-form"> --}}
                                <div class="row">

                                    @if (Auth::user()->description !== null)
                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Description</label>
                                            <textarea placeholder=""></textarea>
                                        </div>
                                    @endif


                                    <div class="form-group col-lg-12 col-md-12">
                                        <!-- Resume / Education -->
                                        <div class="resume-outer">
                                            <div class="upper-title">
                                                <h4>Education</h4>
                                                <a href="#" class="add-info-btn" data-bs-toggle="modal"
                                                    data-bs-target="#addEducation"><span
                                                        class="icon flaticon-plus"></span> Add
                                                    Education</a>
                                            </div>
                                            @if (count($educations) > 0)
                                                @foreach ($educations as $education)
                                                    <!-- Resume BLock -->
                                                    <div class="resume-block">
                                                        <div class="inner">
                                                            <span class="name">M</span>
                                                            <div class="title-box">
                                                                <div class="info-box">
                                                                    <h3>{{ $education->qualification }}</h3>
                                                                    <span>{{ $education->institution }}</span>
                                                                </div>
                                                                <div class="edit-box">
                                                                    <span
                                                                        class="year">{{ gmdate('Y', strtotime($education->start_date)) }}
                                                                        -
                                                                        {{ gmdate('Y', strtotime($education->end_date)) }}</span>
                                                                    <div class="edit-btns">
                                                                        <a href="{{ route('education.edit', [$education->id]) }}"
                                                                            class="btn btn-sm btn-outline-info mx-1"><span
                                                                                class="la la-pencil"></span></a>

                                                                        <a href="{{ route('education.delete', [$education->id]) }}"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                                                class="la la-trash"></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text">{{ $education->description }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-danger mb-5">No Education Record Found</span>
                                            @endif

                                        </div>

                                        <!-- Resume / Work & Experience -->
                                        <div class="resume-outer theme-blue">
                                            <div class="upper-title">
                                                <h4>Work & Experience</h4>
                                                <a href="{{ route('workexperience.create') }}"
                                                    class="add-info-btn"><span class="icon flaticon-plus"></span> Add
                                                    Work & Experience</a>
                                            </div>

                                            @if (count($workexperiences) > 0)
                                                @foreach ($workexperiences as $workexperience)
                                                    <!-- Resume BLock -->
                                                    <div class="resume-block">
                                                        <div class="inner">
                                                            <span class="name">S</span>
                                                            <div class="title-box">
                                                                <div class="info-box">
                                                                    <h3>{{ $workexperience->job_title }}</h3>
                                                                    <span>{{ $workexperience->company_name }}</span>
                                                                </div>
                                                                <div class="edit-box">
                                                                    <span
                                                                        class="year">{{ gmdate('Y', strtotime($workexperience->start_date)) }}
                                                                        -
                                                                        {{ gmdate('Y', strtotime($workexperience->end_date)) }}</span>
                                                                    <div class="edit-btns">
                                                                        <a href="{{ route('workexperience.edit', [$workexperience->id]) }}"
                                                                            class="btn btn-sm btn-outline-info mx-1"><span
                                                                                class="la la-pencil"></span></a>

                                                                        <a href="{{ route('workexperience.delete', [$workexperience->id]) }}"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                                                class="la la-trash"></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                {{ $workexperience->description }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-danger">No Work Experience Record Found</span>
                                            @endif


                                        </div>
                                    </div>


                                    <div class="resume-outer theme-yellow">
                                        <div class="upper-title">
                                            <h4>License, Certificates & Awards</h4>
                                            <a href="#addAwardForm" data-bs-toggle="collapse" class="add-info-btn"><span
                                                    class="icon flaticon-plus"></span> Add
                                                License, Certificates & Awards</a>
                                        </div>
                                        <x-user.addaward :awardtypes="$awardtypes"/>

                                        @if (count($awards) > 0)
                                                @foreach ($awards as $award)
                                                    <!-- Resume BLock -->
                                                    <div class="resume-block">
                                                        <div class="inner">
                                                            <span class="name">A</span>
                                                            <div class="title-box">
                                                                <div class="info-box">
                                                                    <h3>{{ $award->award_title }}</h3>
                                                                    <span class="small"> Type:
                                                                        {{ucfirst(App\Models\AwardType::find($award->award_type)->name) }}
                                                                    </span>
                                                                </div>
                                                                <div class="edit-box">
                                                                    <span class="year">
                                                                        {{ $award->issue_date }}
                                                                    </span>
                                                                    <div class="edit-btns">
                                                                        <a href="{{ route('award.delete', [$award->id]) }}"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                                                class="la la-trash"></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="text">
                                                                {{ $workexperience->description }}
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-danger">No License, Certificates & Awards Found</span>
                                            @endif


                                    </div>





                    <div class="resume-outer theme-green">
                        <div class="upper-title">
                            <h4>Portfolio</h4>
                            <a href="#addPortfolioForm" data-bs-toggle="collapse"
                                class="add-info-btn"><span class="icon flaticon-plus"></span> Add
                                Portfolio</a>
                        </div>
                        
                        <x-user.addportfolio />
                        @foreach ($portfolios as $portfolio)
                        <div class="resume-block">
                            <div class="inner">
                              <span class="name">P</span>
                              <div class="title-box">
                                <div class="info-box">
                                  <h3>{{$portfolio->project_title}}</h3>
                                  <span class="small">{{$portfolio->project_role}}</span>
                                  <span></span>
                                </div>
                                <div class="edit-box">
                                  {{-- <span class="year">2012 - 2014</span> --}}
                                  <div class="edit-btns">
                                    {{-- <button><span class="la la-pencil"></span></button> --}}
                                    <a href="#portfolio{{$portfolio->id}}"  data-bs-toggle="collapse" role="button"
                                        class="btn btn-sm btn-outline-info mx-1"><span
                                            class="la la-eye"></span></a>

                                    <a href="{{ route('portfolio.delete', [$portfolio->id]) }}"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure, you want to delete it?')"><span
                                            class="la la-trash"></span></a>
                                  </div>
                                </div>
                              </div>

                              <div class="collapse" id="portfolio{{$portfolio->id}}">
                                <div class="text">
                                    {{$portfolio->project_solution}}
                                
                                    <div class="mt-1">
                                    @if (isset($portfolio->project_url))
                                        Project Link: <a href="{{$portfolio->project_url}}" class="btn btn-sm btn-outline-warning" target="_blank">View Project Online</a>
                                    @endif
                                    </div>

                                    @if ($portfolio->images != null)
                                    <div class="mt-3">
                                        <span class="text-decoration-underline">Project Images</span>
                                        <br>
                                        @foreach ($portfolio->images as $image)
                                        <img width="20%" src="{{asset($image->image_url)}}" alt="">
                                        @endforeach
                                    </div>
                                    @endif

                                </div>
                              </div>
                             
                            </div>
                          </div>
                        @endforeach
                        
                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- End Dashboard -->



</x-user.layout>
