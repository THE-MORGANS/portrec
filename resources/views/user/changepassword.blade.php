<x-user.layout>

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
          <div class="upper-title-box">
            <h3>Change Password</h3>
            <div class="text">Ready to jump back in?</div>
          </div>
  
          <!-- Ls widget -->
          <div class="ls-widget">
            <div class="widget-title">
             
            </div>
  
            <div class="widget-content">
              <form class="default-form" action="{{route('profile.updatepassword', auth()->user()->id)}}" method="POST">
                @csrf
                <div class="row">
                  <!-- Input -->
                  <div class="form-group col-lg-7 col-md-12">
                    <label>Old Password </label>
                    <input type="password" name="oldpassword" placeholder="">
                    @if ($errors->has('oldpassword'))
                        <span class="text-danger">{{ $errors->first('oldpassword') }}</span>
                    @endif
                  </div>
  
                  <!-- Input -->
                  <div class="form-group col-lg-7 col-md-12">
                    <label>New Password</label>
                    <input type="text" name="password" placeholder="">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
  
                  <!-- Input -->
                  <div class="form-group col-lg-7 col-md-12">
                    <label>Confirm Password</label>
                    <input type="text" name="password_confirmation" placeholder="">
                  </div>
  
                  <!-- Input -->
                  <div class="form-group col-lg-6 col-md-12">
                    <button type="submit" class="theme-btn btn-style-one">Update Password</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <!-- End Dashboard -->
  
    </x-user.layout>