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
                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        {{-- <div class="form-group col-lg-6 col-md-12">
                            <label>Select Your CV</label>
                            <select class="chosen-select">
                              <option>My CV</option>
                            </select>
                          </div> --}}


                                        @if (Auth::user()->description !== null)
                                            <!-- About Company -->
                                            <div class="form-group col-lg-12 col-md-12">
                                                <label>Description</label>
                                                <textarea
                                                    placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
                                            </div>
                                        @endif


                                        <div class="form-group col-lg-12 col-md-12">
                                            <!-- Resume / Education -->
                                            <div class="resume-outer">
                                                <div class="upper-title">
                                                    <h4>Education</h4>
                                                    <a href="#" class="add-info-btn" data-bs-toggle="modal" data-bs-target="#addEducation"><span class="icon flaticon-plus"></span> Add
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
                                                                        <h3>{{$education->qualification}}</h3>
                                                                        <span>{{$education->institution}}</span>
                                                                    </div>
                                                                    <div class="edit-box">
                                                                        <span class="year">{{gmdate('Y', strtotime($education->start_date))}} - {{gmdate('Y', strtotime($education->end_date))}}</span>
                                                                        <div class="edit-btns">
                                                                            <button><span
                                                                                    class="la la-pencil"></span></button>
                                                                            <button><span
                                                                                    class="la la-trash"></span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="text">{{$education->description}}</div>
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
                                                    <a href="#" class="add-info-btn"  data-bs-toggle="modal" data-bs-target="#addWorkExperience"><span class="icon flaticon-plus"></span> Add
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
                                                                        <h3>Product Designer</h3>
                                                                        <span>Spotify Inc.</span>
                                                                    </div>
                                                                    <div class="edit-box">
                                                                        <span class="year">2012 - 2014</span>
                                                                        <div class="edit-btns">
                                                                            <button><span
                                                                                    class="la la-pencil"></span></button>
                                                                            <button><span
                                                                                    class="la la-trash"></span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="text">Lorem ipsum dolor sit amet,
                                                                    consectetur
                                                                    adipiscing elit. Proin a ipsum tellus. Interdum et
                                                                    malesuada fames ac ante<br> ipsum primis in
                                                                    faucibus.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="text-danger">No Work Experience Record Found</span>
                                                @endif


                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <div class="uploading-outer">
                                                <div class="uploadButton">
                                                    <input class="uploadButton-input" type="file"
                                                        name="attachments[]" accept="image/*, application/pdf"
                                                        id="upload" multiple />
                                                    <label class="uploadButton-button ripple-effect" for="upload">Add
                                                        Portfolio</label>
                                                    <span class="uploadButton-file-name"></span>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group col-lg-12 col-md-12">
                            <!-- Resume / Awards -->
                            <div class="resume-outer theme-yellow">
                              <div class="upper-title">
                                <h4>Awards</h4>
                                <button class="add-info-btn"><span class="icon flaticon-plus"></span> Awards</button>
                              </div>
                              <!-- Resume BLock -->
                              <div class="resume-block">
                                <div class="inner">
                                  <span class="name"></span>
                                  <div class="title-box">
                                    <div class="info-box">
                                      <h3>Perfect Attendance Programs</h3>
                                      <span></span>
                                    </div>
                                    <div class="edit-box">
                                      <span class="year">2012 - 2014</span>
                                      <div class="edit-btns">
                                        <button><span class="la la-pencil"></span></button>
                                        <button><span class="la la-trash"></span></button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>
                                </div>
                              </div>
                            </div>
                          </div> --}}

                                        {{-- <!-- Search Select -->
                          <div class="form-group col-lg-6 col-md-12">
                            <label>Skills </label>
                            <select data-placeholder="Categories" class="chosen-select multiple" multiple tabindex="4">
                              <option value="Banking">Banking</option>
                              <option value="Digital&Creative">Digital & Creative</option>
                              <option value="Retail">Retail</option>
                              <option value="Human Resources">Human Resources</option>
                              <option value="Management">Management</option>
                            </select>
                          </div> --}}

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>
    <!-- End Dashboard -->


      


</x-user.layout>
