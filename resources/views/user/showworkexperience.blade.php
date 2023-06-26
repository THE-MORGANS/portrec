<x-user.layout>
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3> Update Work Experience </h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                        
                      </div>

                            <div class="widget-content">

                                <form class="default-form" method="post" action="{{ route('workexperience.update', $workexperience->id) }}">
                                    @csrf
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" value="{{$workexperience->company_name}}" placeholder="">
                                            @if ($errors->has('company_name'))
                                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Company Location</label>
                                            <input type="text" name="company_location" value="{{$workexperience->company_location}}" placeholder="">
                                            @if ($errors->has('company_location'))
                                                <span class="text-danger">{{ $errors->first('company_location') }}</span>
                                            @endif
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Start Date</label>
                                            <input type="text" name="start_date" value="{{$workexperience->start_date}}" id="startdate" placeholder="">
                                            @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>End Date</label>
                                            <input type="text" name="end_date" value="{{$workexperience->end_date}}" id="enddate" placeholder="">
                                            @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                        </div>

                                         <!-- Input -->
                                         <div class="form-group col-lg-4 col-md-12">
                                            <label>Job Title</label>
                                            <input type="text" name="job_title" value="{{$workexperience->job_title}}" id="job_title" placeholder="">
                                            @if ($errors->has('job_title'))
                                            <span class="text-danger">{{ $errors->first('job_title') }}</span>
                                        @endif
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label>Job Level</label>
                                            <input type="text" name="job_level" value="{{$workexperience->job_level}}" id="job_level" placeholder="">
                                            @if ($errors->has('job_level'))
                                            <span class="text-danger">{{ $errors->first('job_level') }}</span>
                                        @endif
                                        </div>

                                                                                <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label>Industry</label>
                                            <select class="chosen-select" name="industries_id" style="display: none;">
                                                <option value="">Select</option>
                                                @foreach ($industries as $industry)
                                                <option value="{{$industry->id}}" {{$industry->id == $workexperience->industries_id ? 'selected' : ''}}>{{$industry->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('industries_id'))
                                            <span class="text-danger">{{ $errors->first('industries_id') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Function</label>
                                            <select class="chosen-select" name="job_function_id" style="display: none;">
                                                <option value="">Select</option>
                                                @foreach ($jobfunctions as $jobfunction)
                                                <option value="{{$jobfunction->id}}" {{$jobfunction->id == $workexperience->job_function_id ? 'selected' : ''}}>{{$jobfunction->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('job_function_id'))
                                            <span class="text-danger">{{ $errors->first('job_function_id') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Salary</label>
                                            <input type="text" name="salary_range" value="{{$workexperience->salary_range}}" id="salary_range" placeholder="">
                                            @if ($errors->has('salary_range'))
                                            <span class="text-danger">{{ $errors->first('salary_range') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Work Type</label>
                                            <select class="chosen-select" name="work_type_id" style="display: none;">
                                                <option value="">Select</option>
                                                {{-- <option value="12" selected>Value 12</option> --}}
                                                @foreach ($worktypes as $worktype)
                                                <option value="{{$worktype->id}}" {{$worktype->id == $workexperience->work_type_id ? 'selected' : ''}}>{{$worktype->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('work_type_id'))
                                            <span class="text-danger">{{ $errors->first('work_type_id') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Status</label>
                                            <input type="text" name="status" value="{{$workexperience->status}}" id="status" placeholder="">
                                            @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                        </div>


                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Description</label>
                                            <textarea
                                                placeholder="" name="description">{{$workexperience->description}}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12 text-right">
                                            <button type="submit" class="theme-btn btn-style-one">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </section>
    <!-- End Dashboard -->





</x-user.layout>
