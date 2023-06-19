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

                                <form class="default-form" method="post" action="{{route('education.update', [$education->id])}}">
                                    @csrf
                                    <div class="row">
                                        <!-- Input -->
                                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                                <label for="institution"> Institution </label>
                                                <input type="text" name="institution" value="{{$education->institution}}" class="form-control" id="floatingPassword" placeholder="Institution">
                                                @if ($errors->has('institution'))
                                                <span class="text-danger">{{ $errors->first('institution') }}</span>
                                            @endif
                                              </div>
                
                                        <!-- Input -->
                                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                                <label for="qualification">Qualification</label>
                                                <input type="text" name="qualification" value="{{$education->qualification}}" class="form-control" id="floatingPassword" placeholder="">
                                                @if ($errors->has('qualification'))
                                                <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                            @endif
                                            </div>
                
                                        
                                        <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                                <label for="start_date">Start Date</label>
                                                <input type="text" id="startdate" value="{{$education->start_date}}" name="start_date" class="form-control" placeholder="">
                                                @if ($errors->has('start_date'))
                                                <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                            @endif
                                              </div>
                
                                         <!-- Input -->
                                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                                <label for="end_date">End Date</label>
                                                <input type="text" id="enddate" value="{{$education->end_date}}" name="end_date" class="form-control" id="floatingPassword" placeholder="">
                                                @if ($errors->has('end_date'))
                                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                            @endif
                                            </div>
                
                                            <!-- Input -->
                                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                                <label for="description">Description</label>
                                                <textarea class="form-group" name="description" placeholder="" id="floatingTextarea">{{$education->description}}</textarea>
                                                @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                            </div>
                                       
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
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
