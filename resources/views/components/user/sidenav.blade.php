<a class="mobNavigation" data-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
  <i class="fas fa-bars mr-2"></i>Dashboard Navigation
</a>

      <div class="collapse" id="MobNav">
      <div class="dashboard-nav">
          <div class="dashboard-inner">
              <ul data-submenu-title="Main Navigation">
                <li><a href="{{route('dashboard.index')}}"><i class="fa-solid fa-house-user"></i> Home </a></li>
                <li><a href="{{route('dashboard.loadjobs')}}"><i class="fa-solid fa-briefcase"></i> Jobs </a></li>
                <li><a href="{{route('dashboard.loaduserappliedjobs', auth()->user()->id)}}"><i class="fa-solid fa-house-laptop"></i> Applied Jobs </a></li>
                <li><a href="{{route('dashboard.loadresumepage')}}"><i class="fa-solid fa-timeline"></i> My Resume </a></li>
                <li><a href="{{route('dashboard.loadcvmanagerpage')}}"><i class="fa-solid fa-file-word"></i> CV Manager </a></li>
                <li><a href="{{route('dashboard.companies')}}"><i class="fa-regular fa-building"></i> Companies </a></li>
              </ul>
              <ul data-submenu-title="My Accounts">
                <li><a href="{{route('profile.edit', auth()->user()->id)}}"><i class="fa-solid fa-user"></i>View Profile</a></li>
                <li><a href="{{route('dashboard.loadupdatepassword', auth()->user()->id)}}"><i class="fa-solid fa-key"></i> Change Password </a></li>
                <li><a href="{{route('user.logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
              </ul>
          </div>					
      </div>
  </div>