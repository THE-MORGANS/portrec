<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/candidate-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jan 2023 14:17:35 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Portrec Dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Portrec</title>
		 
        <!-- Custom CSS -->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
		
        <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}" rel="stylesheet">
    
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link href="{{ asset('css/jquery.datetimepicker.css') }}" rel="stylesheet">


    </head>
	
    <body>
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
       <div class="preloader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-light dark-text head-shadow">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="{{asset('img/logo/logo.png')}}" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
								<li>
									<a href="{{route('user.logout')}}" class="crs_yuo12 w-auto text-dark gray">
										<span class="embos_45"><i class="lni lni-power-switch mr-1 mr-1"></i>Logout</span>
									</a>
								</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
								<li><a href="{{route('dashboard.index')}}">Home</a></li>
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<li class="add-listing gray">
									<a href="{{route('user.logout')}}" >
										<i class="lni lni-power-switch mr-1"></i> Logout
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ======================= dashboard Detail ======================== -->
			
			<div class="dashboard-wrap bg-light">
			
                {{-- Side Nav --}}
                <x-user.sidenav />
                {{-- Side Nav --}}

				
				<div class="dashboard-content">
					

                    {{ $slot }}
					
					<!-- footer -->
					<div class="row">
						<div class="col-md-12">
							<div class="py-3">© {{date('Y')}} Portrec.</div>
						</div>
					</div>
		
				</div>
				
			</div>
			<!-- ======================= dashboard Detail End ======================== -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/slick.js')}}"></script>
		<script src="{{asset('js/slider-bg.js')}}"></script>
		<script src="{{asset('js/smoothproducts.js')}}"></script>
		<script src="{{asset('js/snackbar.min.js')}}"></script>
		<script src="{{asset('js/jQuery.style.switcher.js')}}"></script>
		<script src="{{asset('js/custom.js')}}"></script>
        <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.7/dist/js/tempus-dominus.min.js"
        crossorigin="anonymous"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->	

        <x-general.flash-message />
	</body>

</html>