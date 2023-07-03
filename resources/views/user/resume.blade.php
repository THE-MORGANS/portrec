<x-user.layout>

    @php
    $userprofilepicture = App\Models\ProfilePicture::with('user')->first();
    $user = auth()->user(); 
  @endphp

    <div class="dashboard-tlbar d-block mb-5">
      <div class="row">
        <div class="colxl-12 col-lg-12 col-md-12">
          <h1 class="ft-medium">Resume</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="theme-cl">Resume</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  
    <div class="dashboard-widg-bar d-block">
      <div class="container">
        
        <section class="middle">
            <div class="container">
                <div class="row align-items-start justify-content-between">
                
                    <div class="col-12 col-md-12 col-lg-4 col-xl-4 text-center miliods">
                        <div class="d-block border rounded mfliud-bot mb-4">
                            <div class="cdt_author px-2 pt-5 pb-4">
                                <div class="dash_auth_thumb circle p-1 border d-inline-flex mx-auto mb-2">
                                    <img src="{{asset($userprofilepicture->image)}}" class="img-fluid circle" width="100" alt="">
                                </div>
                                <div class="dash_caption mb-3">
                                    <h4 class="fs-lg ft-medium mb-0 lh-1">{{$user->name}}</h4>
                                    <p class="m-0 p-0">{{$user->email}}</p>
                                    <span class="text-muted smalls">{{ $user->phone ?? 'No Phone' }}</span>
                                    <p class="m-0 p-0">{{ $user->state.', '.$user->country }}</p>
                                </div>
                                <div class="jb-list-01-title px-2">

                                    <span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded theme-cl theme-bg-light">English</span>
                                    <span class="mr-2 mb-2 d-inline-flex px-2 py-1 rounded text-warning bg-light-warning">Swiss</span>
                                </div>
                            </div>
                            
                            {{-- <div class="cdt_caps">
                                <div class="job_grid_footer pb-3 px-3 d-flex align-items-center justify-content-between">
                                    <div class="df-1 text-muted"><i class="lni lni-briefcase mr-1"></i>Full Time</div>
                                    <div class="df-1 text-muted"><i class="lni lni-laptop-phone mr-1"></i>Web Designer</div>
                                </div>	
                                <div class="job_grid_footer px-3 d-flex align-items-center justify-content-between">
                                    <div class="df-1 text-muted"><i class="lni lni-envelope mr-1"></i>themezhub@gmail.com</div>
                                    <div class="df-1 text-muted"><i class="lni lni-graduation mr-1"></i>3 Year Exp.</div>
                                </div>
                            </div>
                             --}}
                            <div class="cdt_caps py-5 px-3">
                                <a href="#" class="btn btn-md theme-bg text-light rounded full-width">Download Resume</a>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                    
                        <!-- row -->
                        <div class="row align-items-start">
                            
                            <!-- About -->
                            <div class="abt-cdt d-block full-width mb-4">
                                <h4 class="ft-medium mb-1 fs-md">About {{auth()->user()->name}}</h4>
                                <p>
                                    {{$user->description ?? 'No Description Found'}}
                                </p>
                            </div>
                            
                            <!-- Education -->
                            <div class="abt-cdt d-block full-width mb-4">
                                <div class="d-flex justify-content-between">
                                    <h4 class="ft-medium mb-1 fs-md">Education</h4>
                                    <span class="text-right"> <a href="#addEducationForm" data-bs-toggle="collapse">Add Education Record</a> </span>
                                </div>
                                <div class="exslio-list mt-3">

                                    <ul>
                                        @if (count($educations) <= 0)
                                            <span> No Education Record Found </span>
                                        @else
                                        @foreach ($educations as $education)
                                        <li>
                                            <div class="esclio-110 bg-light-warning rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">{{ $education->qualification }}
                                                <span class="mx-5">  
                                                    <a href="{{ route('education.edit', [$education->id]) }}"
                                                        class="btn btn-sm rounded text-info"><span
                                                            class="fa fa-pencil"></span></a>

                                                    <a href="{{ route('education.delete', [$education->id]) }}"
                                                        class="btn btn-sm rounded text-danger"
                                                        onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                            class="fa fa-trash"></span></a> 
                                                </span>
                                                </h4>
                                                <hr class="m-0 p-0" />
                                                <div class="esclio-110-info full-width my-1">
                                                    <span class="text-muted mr-2"><i class="lni lni-graduation mr-1"></i>{{ $education->institution }}</span>
                                                    <span class="text-dark rounded mr-2 badge badge-info"><i class="lni lni-calendar mr-1"></i>{{ gmdate('Y', strtotime($education->start_date)) }} - {{ gmdate('Y', strtotime($education->end_date)) }}</span>
                                                </div>
                                                <div class="esclio-110-decs full-width">
                                                    <p>
                                                        {{ $education->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="collapse" id="addEducationForm">
                                    <div class="card card-body">
                                      Form Goes Here
                                    </div>
                                  </div>
                            </div>

                            <!-- License and Certification -->
                            <div class="abt-cdt d-block full-width mb-4">
                                <div class="d-flex justify-content-between">
                                    <h4 class="ft-medium mb-1 fs-md">Certifications</h4>
                                    <span class="text-right"> <a href="#addAwardForm" data-bs-toggle="collapse">Add Certification Record</a> </span>
                                </div>
                                <div class="exslio-list mt-3">
                                    <ul>
                                        @if (count($awards) <= 0)
                                            <span> No Education Record Found </span>
                                        @else
                                        @foreach ($awards as $award)
                                        <li>
                                            <div class="esclio-110 bg-light-success rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">{{ $award->award_title }}
                                                <span class="mx-5">  
                                                    <a href="{{ route('award.edit', [$award->id]) }}"
                                                        class="btn btn-sm rounded text-info"><span
                                                            class="fa fa-pencil"></span></a>

                                                    <a href="{{ route('award.delete', [$award->id]) }}"
                                                        class="btn btn-sm rounded text-danger"
                                                        onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                            class="fa fa-trash"></span></a> 
                                                </span>
                                                </h4>
                                                <hr class="m-0 p-0" />
                                                <div class="esclio-110-info full-width my-1">
                                                    <span class="text-muted mr-2">Award Type: {{ucfirst(App\Models\AwardType::find($award->award_type)->name) }}</span>
                                                    <span class="text-white rounded mr-2 badge badge-info"><i class="lni lni-calendar mr-1"></i>{{ gmdate('Y', strtotime($award->issue_date)) }}</span>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <div class="collapse" id="addAwardForm">
                                        <div class="card card-body">
                                          Form Goes Here
                                        </div>
                                      </div>
                                </div>
                            </div>
                            
                            <!-- Experience -->
                            <div class="abt-cdt d-block full-width mb-4">
                                <div class="d-flex justify-content-between">
                                    <h4 class="ft-medium mb-1 fs-md">Work Experience</h4>
                                    <span class="text-right"> <a href="#addExperienceForm" data-bs-toggle="collapse">Add Work Experience Record</a> </span>
                                </div>
                                <div class="exslio-list mt-3">
                                    <ul>
                                        @if (count($workexperiences) <= 0)
                                        <span> No Work Experience Record Found </span>
                                        @else
                                            @foreach ($workexperiences as $workexperience)
                                            <li>
                                                <div class="esclio-110 bg-light-danger rounded px-3 py-3">
                                                    <h4 class="mb-0 ft-medium fs-md">{{ $workexperience->job_title }} -  
                                                        <span class="theme-cl">{{ $workexperience->company_name }}</span>
                                                        <span class="mx-5">
                                                            <a href="{{ route('workexperience.edit', [$workexperience->id]) }}"
                                                                class="btn btn-sm rounded mx-1"><span
                                                                    class="fa fa-pencil text-info"></span></a>

                                                            <a href="{{ route('workexperience.delete', [$workexperience->id]) }}"
                                                                class="btn btn-sm rounded"
                                                                onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                                    class="fa fa-trash text-danger"></span></a>
                                                        </span>
                                                    </h4>
                                                    <hr class="m-0 p-0"/>
                                                    <div class="esclio-110-info full-width mb-2">
                                                        <span class="text-muted mr-2"><i class="lni lni-map-marker mr-1"></i>Liverpool, UK</span>
                                                        <span class="text-muted mr-2"><i class="lni lni-laptop-phone mr-1"></i>UI/UX Designer</span>
                                                        <span class="text-muted mr-2"><i class="lni lni-calendar mr-1"></i>
                                                            {{ gmdate('Y', strtotime($workexperience->start_date)) }}
                                                            -
                                                            {{ gmdate('Y', strtotime($workexperience->end_date)) }}
                                                        </span>
                                                    </div>
                                                    <div class="esclio-110-decs full-width">
                                                        <p>{{ $workexperience->description }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                                <div class="collapse" id="addExperienceForm">
                                    <div class="card card-body">
                                      Form Goes Here
                                    </div>
                                  </div>
                            </div>

                            {{-- Portfolio --}}
                            <div class="abt-cdt d-block full-width mb-4">
                                <div class="d-flex justify-content-between">
                                    <h4 class="ft-medium mb-1 fs-md">Work Portfolio</h4>
                                    <span class="text-right"> <a href="#addPortfolioForm" data-bs-toggle="collapse">Add Work Portfolio Record</a> </span>
                                </div>
                                <div class="exslio-list mt-3">
                                    <ul>
                                        @if (count($portfolios) <= 0)
                                        <span> No Work Experience Record Found </span>
                                        @else
                                            @foreach ($portfolios as $portfolio)
                                            <li>
                                                <div class="esclio-110 bg-grey rounded px-3 py-3">
                                                    <h4 class="mb-0 ft-medium fs-md">{{ $portfolio->project_title }} -  
                                                        <span class="theme-cl">{{$portfolio->project_role}}</span>
                                                        <span class="mx-5">
                                                            <a href="#portfolio{{$portfolio->id}}"  data-bs-toggle="collapse" role="button" class="btn btn-sm mx-1"><span class="fa fa-eye text-info"></span></a>
                        
                                                            <a href="{{ route('portfolio.delete', [$portfolio->id]) }}"
                                                                class="btn btn-sm"
                                                                onclick="return confirm('Are you sure, you want to delete it?')"><span
                                                                    class="fa fa-trash text-danger"></span></a>
                                                        </span>
                                                    </h4>
                                                    <hr class="m-0 p-0"/>
                                                    <div class="esclio-110-decs full-width">
                                                        <p>{{ $workexperience->description }}</p>
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
                                            </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                                <div class="collapse" id="addPortfolioForm">
                                    <div class="card card-body">
                                      Form Goes Here
                                    </div>
                                  </div>
                            </div>
                            
                            <!-- Skills -->
                            <div class="abt-cdt d-block full-width">
                                <h4 class="ft-medium mb-1 fs-md">Skills</h4>
                                <ul class="p-0 skills_tag text-left">
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">Joomla</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">WordPress</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">Javascript</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">PHP</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">HTML5</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">MS SQL</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">SQL Development</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">Dynamod</span></li>
                                    <li><span class="px-2 py-1 medium skill-bg rounded text-dark">Database</span></li>
                                </ul>
                            </div>
                            
                        </div>
                        <!-- row -->
                        
                    </div>
                    
                </div>
            </div>
        </section>

      </div>
    </div>
  
    </x-user.layout>