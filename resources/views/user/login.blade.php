<x-landing.layout>

    <!-- ======================= Top Breadcrubms ======================== -->
    {{-- <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ======================= Top Breadcrubms ======================== -->
    
    <!-- ======================= Login Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-start justify-content-between">
					
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<form class="border p-3 rounded" method="POST" action="/login">		
                                @csrf		
								<div class="form-group">
									<label>Email *</label>
									<input type="text" name="loginemail" class="form-control" value="{{ old('loginemail') }}" placeholder="Email" required>
										@if ($errors->has('loginemail'))
										<span class="text-danger">{{ $errors->first('loginemail') }}</span>
										@endif
								</div>
								
								<div class="form-group">
									<label>Password *</label>
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
											<a href="#">Lost Your Password?</a>
										</div>	
									</div>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Login</button>
								</div>
							</form>
						</div>
    <!-- ======================= Login Detail End======================== -->
    
    
    <!-- ======================= Register Detail End======================== -->					
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
							<form method="post" action="/register">
                                {{csrf_field()}}
								
								<div class="form-group">
									<label>Full Name *</label>
                                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="{{ old('fullname') }}">
                                    @if ($errors->has('fullname'))
                                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                    @endif
								</div>
								
								<div class="form-group">
									<label>Email *</label>
									<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label>Password *</label>
										<input id="password-field" type="password" class="form-control" name="password" value="" placeholder="Password">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
									</div>
									
									<div class="form-group col-md-6">
										<label>Confirm Password *</label>
										<input type="password_comfirmation" class="form-control" placeholder="Confirm Password*">
									</div>
								</div>
								
								<div class="form-group">
									<p>By registering your details, you agree with our <a href="#">Terms & Conditions</a>, and <a href="#">Privacy and Cookie Policy</a>.</p>
								</div>
								
								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="ddd" class="checkbox-custom" name="ddd" type="checkbox">
											<label for="ddd" class="checkbox-custom-label">Sign me up for the Newsletter!</label>
										</div>		
									</div>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Create An Account</button>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Login End ======================== -->
    
    
         <!-- ======================= Newsletter Start ============================ -->
         <x-landing.newsletter />
        <!-- ======================= Newsletter Start ============================ -->
    
    </x-landing.layout>