<x-user.layout>

    @php
      $userprofilepicture = App\Models\ProfilePicture::with('user')->first();
      $user = auth()->user(); 
    @endphp


    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
          <div class="upper-title-box">
            <h3>My Profile</h3>
            <div class="text">Ready to jump back in?</div>
          </div>
  
          <div class="row">
            <div class="col-lg-12">
              
             <div class="row">
              <div class="col-lg-4">
                <div class="ls-widget">
                  <div class="tabs-box">
                    <div class="widget-content p-4">
                      <img src="{{asset($userprofilepicture->image)}}" width="90%" class="img-thumbnail" alt="{{$user->name}}" />
                      <h6 class="m-0 p-0">{{$user->name}}</h6>
                      <span class="small text-muted m-0"> {{$user->email}} </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="ls-widget">
                  <div class="tabs-box">
                    <div class="widget-title">
                      <h4>Profile Picture</h4>
                    </div>
                <div class="widget-content">
                <form class="default-form" action="{{route('userprofilepicture.upload', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="uploading-outer">
                    <div class="uploadButton" style="display: block">
                      <input class="uploadButton-input" type="file" name="image" accept="image/*" id="upload"/>
                      <label class="uploadButton-button ripple-effect" for="upload">Select Display Picture</label>
                      <span class="uploadButton-file-name"></span>
                    </div>
                    <div class="small">Max File Size: 1MB, Resolution: Square, Minimum dimension: (500x500)px, and Suitable Files are .jpg & .png</div>
                    @if ($errors->has('image'))
                      <div class="small">Error: <span class="text-danger">{{ $errors->first('image') }}</span>  </div>
                    @endif
                  </div>
                  <button type="submit" class="theme-btn btn-style-one">Upload Image</button>
                </form>
                  </div>
                </div>
              </div>
              </div>
             </div>
              
              
              <!-- Ls widget -->
              <div class="ls-widget">
                <div class="tabs-box">
                  <div class="widget-title">
                    <h4>Bio Data/Personal Information</h4>
                  </div>
                  <div class="widget-content">
                  <form class="default-form" action="{{route('profile.update', auth()->user()->id)}}" method="post">
                    @csrf
                      <div class="row">
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Full Name</label>
                          <input type="text" value="{{$user->name}}" name="name" placeholder="">
                          @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Phone</label>
                          <input type="text" name="phone" value="{{$user->phone}}" placeholder="0 123 456 7890">
                          @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                          @endif
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-3 col-md-12">
                          <label>Gender</label>
                          <select class="chosen-select" name="gender">
                            <option value="">Choose Gender</option>
                            <option value="male" {{$user->gender=='male' ? 'selected':''}}>Male</option>
                            <option value="female" {{$user->gender=='female' ? 'selected':''}}>Female</option>
                          </select>
                        </div>

                         <!-- Input -->
                         <div class="form-group col-lg-3 col-md-12">
                          <label>Date of Birth</label>
                          <input type="text" id="dob" value="{{$user->dob}}" name="dob" placeholder="01 Jan, 1900" autocomplete="off">
                        </div>
                        
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Languages</label>
                          <input type="text" name="languages" value="{{$user->languages}}" placeholder="Igbo, Efik, Swahili">
                          @if ($errors->has('languages'))
                            <span class="text-danger">{{ $errors->first('languages') }}</span>
                          @endif
                        </div>
  
                       <!-- Input -->
                       <div class="form-group col-lg-6 col-md-12">
                        <label>Industry</label>
                            <select class="chosen-select" name="industries_id" style="display: none;">
                                <option value="">Select</option>
                                @foreach ($industries as $industry)
                                <option value="{{$industry->id}}" {{$user->industries_id == $industry->id? 'selected':''}}>{{$industry->name}}</option>
                                @endforeach
                            </select>
                            

                        {{-- <input type="text" 
                            value="{{ old('industries_id') }}" id="industries_id" placeholder=""> --}}
                        @if ($errors->has('industries_id'))
                            <span class="text-danger">{{ $errors->first('industries_id') }}</span>
                        @endif
                    </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Allow In Search & Listing</label>
                          <select class="chosen-select" name="allow_search">
                            <option value="yes" {{$user->allow_search == 'yes' ? 'selected':''}}>Yes</option>
                            <option value="no" {{$user->allow_search == 'no' ? 'selected':''}}>No</option>
                          </select>
                        </div>
  
                        <!-- About Company -->
                        <div class="form-group col-lg-12 col-md-12">
                          <label>Description</label>
                          <textarea placeholder="A little about yourself..." name="description">{{$user->description}}</textarea>
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <button type="submit" class="theme-btn btn-style-one">Update Bio Data</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
  
              <!-- Ls widget -->
              <div class="ls-widget">
                <div class="tabs-box">
                  <div class="widget-title">
                    <h4>Social Network</h4>
                  </div>
  
                  <div class="widget-content">
                    <form class="default-form" action="{{route('socialmedia.update', auth()->user()->id)}}" method="post">
                      @csrf
                      <div class="row">
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Facebook</label>
                          <input type="text" name="facebook" value="{{$user->facebook}}" placeholder="fb.com/yoourusername" required>
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Twitter</label>
                          <input type="text" name="twitter" value="{{$user->twitter}}" placeholder="twitter.com/yourusername">
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Linkedin</label>
                          <input type="text" name="linkedin" value="{{$user->linkedin}}" placeholder="linkedin.com/in/yourusername">
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Google Plus</label>
                          <input type="text" name="googleplus" {{$user->googleplus}} placeholder="googleplus.com/yourusername">
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <button class="theme-btn btn-style-one">Update Social Media</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
  
              <!-- Ls widget -->
              <div class="ls-widget">
                <div class="tabs-box">
                  <div class="widget-title">
                    <h4>Contact Information</h4>
                  </div>
  
                  <div class="widget-content">
                    <form class="default-form" action="{{route('contact.update', auth()->user()->id)}}" method="post">
                      @csrf
                      <div class="row">
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>Country</label>
                          <input type="text" name="country" value="{{$user->country}}" placeholder="Nigeria">
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                          <label>State</label>
                          <input type="text" name="state" value="{{$user->state}}" placeholder="Lagos">
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-12 col-md-12">
                          <label>Complete Address</label>
                          <input type="text" name="address" value="{{$user->address}}" placeholder="123 Address Street, LGA 1234">
                        </div>
  
                        <!-- Input -->
                        <div class="form-group col-lg-12 col-md-12">
                          <button class="theme-btn btn-style-one">Update Contact Information</button>
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