<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jun 2023 11:11:31 GMT -->
<head>
  <meta charset="utf-8">
  <title>Portrec Dashboard</title>

  <!-- Stylesheets -->
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

  <div class="page-wrapper dashboard ">

    <!-- Preloader -->
    <div class="preloader"></div>

        <x-user.topnav />
        <x-user.sidenav />

    

    {{$slot}}

    

    <!-- Copyright -->
    <div class="copyright-text">
      <p>© {{date('Y')}} The Morgans Consortium. All Right Reserved.</p>
    </div>


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


<x-user.chartjs/>

<x-general.flash-message />
</body>

</html>