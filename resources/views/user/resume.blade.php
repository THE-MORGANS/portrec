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


                                    <div class="resume-outer theme-blue">
                                        <div class="upper-title">
                                            <h4>Licsence & Certifications</h4>
                                            <a href="{{ route('workexperience.create') }}" class="add-info-btn"><span
                                                    class="icon flaticon-plus"></span> Add
                                                Licsence and Certification</a>
                                        </div>
                                    </div>





                    <div class="resume-outer theme-blue">
                        <div class="upper-title">
                            <h4>Portfolio</h4>
                            <a href="#collapseExample" data-bs-toggle="collapse"
                                class="add-info-btn"><span class="icon flaticon-plus"></span> Add
                                Portfolio</a>
                        </div>

                        <div class="resume-block">
                            <div class="collapse" id="collapseExample">
                                <blockquote class="blockquote-style-one mb-5 mt-5">
                                    <form class="default-form" method="post"
                                        action="{{ route('education.store') }}">
                                        @csrf
                                        <div class="row">
                                            <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                                <input type="text" name="project_title"
                                                    class="form-control" id="floatingPassword"
                                                    placeholder="{{ $errors->first('project_title') != '' ? $errors->first('project_title') : 'Project Title' }}">
                                            </div>

                                            <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                                <input type="text" name="project_role"
                                                    class="form-control" id="floatingPassword"
                                                    placeholder="{{ $errors->first('project_role') != '' ? $errors->first('project_role') : 'Project Role' }}">
                                            </div>


                                            <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                                <input type="text" id="project_task"
                                                    name="project_task" class="form-control"
                                                    placeholder="{{ $errors->first('project_task') != '' ? $errors->first('project_task') : 'Project Task' }}">
                                            </div>

                                            <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                                <input type="text" id="project_solution"
                                                    name="project_solution" class="form-control"
                                                    id="floatingPassword"
                                                    placeholder="{{ $errors->first('project_solution') != '' ? $errors->first('project_solution') : 'Project Solution' }}">
                                            </div>

                                            <!-- Input -->
                                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                                <input type="text" id="project_url"
                                                    name="project_url" class="form-control"
                                                    id="floatingPassword"
                                                    placeholder="{{ $errors->first('project_url') != '' ? $errors->first('project_url') : 'Project URL' }}">
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <div class="uploading-outer">
                                                    <div class="uploadButton">
                                                        <input class="uploadButton-input"
                                                            type="file" name="attachments[]"
                                                            accept="image/*, application/pdf"
                                                            id="upload" multiple="">
                                                        <label
                                                            class="uploadButton-button ripple-effect"
                                                            for="upload">Upload Portfolio
                                                            Image</label>
                                                        <span class="uploadButton-file-name"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12">
                                                <button type="submit"
                                                    class="theme-btn btn-style-one">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </blockquote>

                            </div>
                        </div>
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
