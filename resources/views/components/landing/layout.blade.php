<!DOCTYPE html>
<html lang="zxx">
	
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Portrec" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Portrec</title>
		 
        <!-- Custom CSS -->
        {{-- <link href="assets/css/styles.css" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}" rel="stylesheet">
		
		
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
			<div class="header header-light dark-text">
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
									<a href="#" data-toggle="modal" data-target="#login" class="theme-cl fs-lg">
										<i class="lni lni-user"></i>
									</a>
								</li>
								<li>
									<a href="dashboard-post-job.html" class="crs_yuo12 w-auto text-white theme-bg">
										<span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Post Job</span>
									</a>
								</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li><a href="{{route('landing.loadhomepage')}}">Home</a></li>
								<li><a href="{{route('landing.loadaboutpage')}}">About Us</a></li>
								<li><a href="{{route('landing.loadcontactpage')}}">Contact</a></li>
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<li>
									<a href="#" data-toggle="modal" data-target="#login" class="ft-medium">
										<i class="lni lni-user mr-2"></i>Sign In
									</a>
								</li>
								<li class="add-listing theme-bg">
									<a href="#" >
										<i class="lni lni-circle-plus mr-1"></i> Post a Job
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

            {{$slot}}
			
			
			<!-- ============================ Footer Start ================================== -->
			<footer class="light-footer skin-light-footer style-2">
				<div class="footer-middle">
					<div class="container">
						<div class="row">
							
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="footer_widget">
									<img src="assets/img/logo.png" class="img-footer small mb-2" alt="" />
									
									<div class="address mt-2">
										EUROPE: International House 24 Holborn Viaduct London, EC1A 2BN, United Kingdom <br>
                                        AFRICA: 1, Adeola Adeoye Street, Off Toyin Street, Ikeja, Lagos Nigeria	
									</div>
									<div class="address mt-3">
										UK: +447466588324 <br> 
                                        NG: +23417001770 | +2349153414314 
                                        <br>cv@portrec.co.uk |  enquiries@portrec.co.uk
									</div>
									<div class="address mt-2">
										<ul class="list-inline">
											<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-facebook-filled"></i></a></li>
											<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-twitter-filled"></i></a></li>
											<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-youtube"></i></a></li>
											<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-instagram-filled"></i></a></li>
											<li class="list-inline-item"><a href="#" class="theme-cl"><i class="lni lni-linkedin-original"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
								<div class="footer_widget">
									<h4 class="widget_title">For Employers</h4>
									<ul class="footer-menu">
										<li><a href="#">Explore Candidates</a></li>
										<li><a href="#">Submit Job</a></li>
										<li><a href="#">Dashboard</a></li>
									</ul>
								</div>
							</div>
									
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
								<div class="footer_widget">
									<h4 class="widget_title">For Candidates</h4>
									<ul class="footer-menu">
										<li><a href="#">Explore All Jobs</a></li>
										<li><a href="#">Dashboard</a></li>
									</ul>
								</div>
							</div>
					
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
								<div class="footer_widget">
									<h4 class="widget_title">About Company</h4>
									<ul class="footer-menu">
										<li><a href="#">Who We Are?</a></li>
										<li><a href="#">Our Mission</a></li>
										<li><a href="#">Our team</a></li>
										<li><a href="#">Packages</a></li>
										<li><a href="#">Dashboard</a></li>
									</ul>
								</div>
							</div>
							
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
								<div class="footer_widget">
									<h4 class="widget_title">Helpful Links</h4>
									<ul class="footer-menu">
										<li><a href="#">Contact</a></li>
										<li><a href="#">FAQ's Page</a></li>
										<li><a href="#">TnC</a></li>
										<li><a href="#">The Morgans</a></li>
									</ul>
								</div>
							</div>
								
						</div>
					</div>
				</div>
				
				<div class="footer-bottom br-top">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-12 col-md-12 text-center">
								<p class="mb-0">© {{date('Y')}} Portrec. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->
			
			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content" id="loginmodal">
						<div class="modal-headers">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span class="ti-close"></span>
							</button>
						  </div>
					
						<div class="modal-body p-5">
							<div class="text-center mb-4">
								<h2 class="m-0 ft-regular">Login</h2>
							</div>
							
							<form method="post" action="/login">
								{{csrf_field()}}				
								<div class="form-group">
									<label>User Name</label>
									<input type="text" name="loginemail" class="form-control" value="{{ old('loginemail') }}" placeholder="Email" required>
										@if ($errors->has('loginemail'))
										<span class="text-danger">{{ $errors->first('loginemail') }}</span>
										@endif
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input id="password-field" class="form-control" type="password" name="loginpassword" value="" placeholder="Password" required>
										@if ($errors->has('loginpassword'))
										<span class="text-danger">{{ $errors->first('loginpassword') }}</span>
										@endif
								</div>
								
								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
											<label for="dd" class="checkbox-custom-label">Remember Me</label>
										</div>	
										<div class="eltio_k2">
											<a href="#" class="theme-cl">Lost Your Password?</a>
										</div>	
									</div>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Login</button>
								</div>
								
								<div class="form-group text-center mb-0">
									<p class="extra">Not a member?<a href="#et-register-wrap" class="text-dark"> Register</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
        
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/slick.js') }}"></script>
		<script src="{{ asset('js/slider-bg.js') }}"></script>
		<script src="{{ asset('js/smoothproducts.js') }}"></script>
		<script src="{{ asset('js/snackbar.min.js') }}"></script>
		<script src="{{ asset('js/jQuery.style.switcher.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->			

		<x-general.flash-message />
	</body>

</html>