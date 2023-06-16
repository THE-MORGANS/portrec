<x-user.layout>
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3> Update Education </h3>
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
