 <!-- Header Span -->
 <span class="header-span"></span>

 @php
    $user = auth()->user();
    $username = explode(" ", $user->name);
    $acronym = "";
    foreach ($username as $un) {
      $acronym .= mb_substr($un, 0, 1);
    }
 @endphp

 <!-- Main Header-->
 <header class="main-header header-shaddow">
   <div class="container-fluid">
     <!-- Main box -->
     <div class="main-box">
       <!--Nav Outer -->
       <div class="nav-outer">
         <div class="logo-box">
           <div class="logo"><a href="index.html"><img src="{{asset('images/logos/logo.png')}}" alt="" title="" width="80%"></a></div>
         </div>

         <nav class="nav main-menu">
           <ul class="navigation" id="navbar">
             <li><a href="/dashboard">Home</a></li>
             
             <!-- Only for Mobile View -->
             <li class="mm-add-listing">
               <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
               <span>
                 <span class="contact-info">
                   <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                   <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                   <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                 </span>
                 <span class="social-links">
                   <a href="#"><span class="fab fa-facebook-f"></span></a>
                   <a href="#"><span class="fab fa-twitter"></span></a>
                   <a href="#"><span class="fab fa-instagram"></span></a>
                   <a href="#"><span class="fab fa-linkedin-in"></span></a>
                 </span>
               </span>
             </li>
           </ul>
         </nav>
         <!-- Main Menu End-->
       </div>

       <div class="outer-box">

         <button class="menu-btn">
           <span class="count">1</span>
           <span class="icon la la-heart-o"></span>
         </button>

         <button class="menu-btn">
           <span class="icon la la-bell"></span>
         </button>

         @php
            $userprofilepicture = App\Models\ProfilePicture::with('user')->first(); 
         @endphp

         <div class="dropdown dashboard-option">
           <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if (isset($userprofilepicture))
            <img src="{{asset($userprofilepicture->image)}}" alt="" class="thumb">
            @else
            <button class="btn btn-md btn-outline-primary rounded-circle"> {{substr($username[0], 0, 1).substr($username[1], 0, 1)}} </button>
            @endif
             <span class="name">My Account</span>
           </a>
           <ul class="dropdown-menu">
               <li><a href="{{route('profile.edit', auth()->user()->id)}}"><i class="la la-user-alt"></i>View Profile</a></li>
             <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
             <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
             <li><a href="{{url('/logout')}}"><i class="la la-sign-out"></i>Logout</a></li>
           </ul>
         </div>


       </div>
     </div>
   </div>

   <!-- Mobile Header -->
   <div class="mobile-header">
     <div class="logo"><a href="index.html"><img src="{{asset('images/logos/logo.png')}}" alt="" title="" width="75%"></a></div>

     <!--Nav Box-->
     <div class="nav-outer clearfix">

       <div class="outer-box">
         <!-- Login/Register -->
         <button class="btn btn-md btn-outline-primary rounded-circle" id="toggle-user-sidebar"> 
          {{substr($username[0], 0, 1).substr($username[1], 0, 1)}} 
        </button>
         <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
       </div>
     </div>

   </div>

   <!-- Mobile Nav -->
   <div id="nav-mobile"></div>
 </header>
 <!--End Main Header -->