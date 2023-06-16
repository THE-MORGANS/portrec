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

                                <form class="default-form" method="post" action="{{ route('workexperience.store') }}">
                                    @csrf
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" value="{{old('company_name')}}" placeholder="">
                                            @if ($errors->has('company_name'))
                                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Company Location</label>
                                            <input type="text" name="company_location" value="{{old('company_location')}}" placeholder="">
                                            @if ($errors->has('company_location'))
                                                <span class="text-danger">{{ $errors->first('company_location') }}</span>
                                            @endif
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Start Date</label>
                                            <input type="text" name="start_date" value="{{old('start_date')}}" id="startdate" placeholder="">
                                            @if ($errors->has('start_date'))
                                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                        @endif
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>End Date</label>
                                            <input type="text" name="end_date" value="{{old('end_date')}}" id="enddate" placeholder="">
                                            @if ($errors->has('end_date'))
                                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                        @endif
                                        </div>

                                         <!-- Input -->
                                         <div class="form-group col-lg-4 col-md-12">
                                            <label>Job Title</label>
                                            <input type="text" name="job_title" value="{{old('job_title')}}" id="job_title" placeholder="">
                                            @if ($errors->has('job_title'))
                                            <span class="text-danger">{{ $errors->first('job_title') }}</span>
                                        @endif
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label>Job Level</label>
                                            <input type="text" name="job_level" value="{{old('job_level')}}" id="job_level" placeholder="">
                                            @if ($errors->has('job_level'))
                                            <span class="text-danger">{{ $errors->first('job_level') }}</span>
                                        @endif
                                        </div>

                                                                                <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label>Industry</label>
                                            <input type="text" name="industries_id" value="{{old('industries_id')}}" id="industries_id" placeholder="">
                                            @if ($errors->has('industries_id'))
                                            <span class="text-danger">{{ $errors->first('industries_id') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Function</label>
                                            <input type="text" name="job_function_id" value="{{old('job_function_id')}}" id="job_function_id" placeholder="">
                                            @if ($errors->has('job_function_id'))
                                            <span class="text-danger">{{ $errors->first('job_function_id') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Salary</label>
                                            <input type="text" name="salary_range" value="{{old('salary_range')}}" id="salary_range" placeholder="">
                                            @if ($errors->has('salary_range'))
                                            <span class="text-danger">{{ $errors->first('salary_range') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Work Type</label>
                                            <input type="text" name="work_type_id" value="{{old('work_type_id')}}" id="work_type_id" placeholder="">
                                            @if ($errors->has('work_type_id'))
                                            <span class="text-danger">{{ $errors->first('work_type_id') }}</span>
                                        @endif
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Status</label>
                                            <input type="text" name="status" value="{{old('status')}}" id="status" placeholder="">
                                            @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                        </div>


                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Description</label>
                                            <textarea
                                                placeholder="" name="description">{{old('description')}}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12 text-right">
                                            <button type="submit" class="theme-btn btn-style-one">Submit</button>
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
