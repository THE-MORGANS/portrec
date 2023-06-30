<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 11:11:47 GMT -->
<head>
  <meta charset="utf-8">
  <title>Register - Portrec</title>

  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
              <div class="logo"><a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt="" title=""></a></div>
            </div>
          </div>

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="btn-box">
              <a href="{{url('/login')}}" class="theme-btn btn-style-three">Login</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="index.html"><img src="images/logo.svg" alt="" title=""></a></div>
      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <!--End Main Header -->

    <!-- Info Section -->
    <div class="login-section">
      <div class="image-layer" style="background-image: url(images/background/12.jpg);"></div>
      <div class="outer-box">
        <!-- Login Form -->
        <div class="login-form default-form">
          <div class="form-inner">
            <h3>Register with Portrec</h3>
            <!--Login Form-->
            <form method="post" action="/register">
              {{csrf_field()}}
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}" required>
                @if ($errors->has('fullname'))
                <span class="text-danger">{{ $errors->first('fullname') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
              </div>

              <div class="form-group">
                <label>Password</label>
                <input id="password-field" type="password" name="password" value="" placeholder="Password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>

              <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" name="log-in">Register</button>
              </div>
            </form>

           

          </div>
        </div>
        <!--End Login Form -->
      </div>
    </div>
    <!-- End Info Section -->


  </div><!-- End Page Wrapper -->


  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/chosen.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox.js')}}"></script>
  <script src="{{asset('js/jquery.modal.min.js')}}"></script>
  <script src="{{asset('js/mmenu.polyfills.js')}}"></script>
  <script src="{{asset('js/mmenu.js')}}"></script>
  <script src="{{asset('js/appear.js')}}"></script>
  <script src="{{asset('js/ScrollMagic.min.js')}}"></script>
  <script src="{{asset('js/rellax.min.js')}}"></script>
  <script src="{{asset('js/owl.js')}}"></script>
  <script src="{{asset('js/wow.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js')}}"></script>

  <x-general.flash-message />

</body>


<!-- Mirrored from creativelayers.net/themes/superio/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 11:11:47 GMT -->
</html>