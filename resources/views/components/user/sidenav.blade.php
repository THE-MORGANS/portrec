<!-- Sidebar Backdrop -->
<div class="sidebar-backdrop"></div>

<!-- User Sidebar -->
<div class="user-sidebar">

  <div class="sidebar-inner">
    <ul class="navigation">
      <li><a href="{{route('dashboard.index')}}"><i class="la la-home"></i> Home </a></li>
      <li><a href="{{route('dashboard.loadjobs')}}"><i class="la la-briefcase"></i> Jobs </a></li>
      <li><a href="{{route('dashboard.loaduserappliedjobs', auth()->user()->id)}}"><i class="las la-check-circle"></i> Applied Jobs </a></li>
      <li><a href="{{route('dashboard.loadresumepage')}}"><i class="la la-business-time"></i> My Resume </a></li>
      <li><a href="{{route('dashboard.loadcvmanagerpage')}}"><i class="la la-file"></i> CV Manager </a></li>
      <li><a href="{{route('dashboard.companies')}}"><i class="las la-industry"></i> Companies </a></li>
      <li><a href="{{route('dashboard.loadupdatepassword', auth()->user()->id)}}"><i class="las la-key"></i> Change Password </a></li>
      <li><a href="{{route('user.logout')}}"><i class="la la-sign-out"></i>Logout</a></li>
    </ul>
  </div>
</div>
<!-- End User Sidebar -->