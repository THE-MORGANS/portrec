<x-user.layout>
  <!-- Dashboard -->
  <section class="user-dashboard">
    <div class="dashboard-outer">
      <div class="upper-title-box">
        <h3>Hi! {{ Auth::user()->name }} </h3>
        <div class="text">Ready to jump back in?</div>
      </div>

      <x-user.topdatarow :applications="$applications"/>
      

      <div class="row">
        
        <div class="col-xl-7 col-lg-12">
          <x-user.graph/>
        </div>
        
        <div class="col-xl-5 col-lg-12">
          <x-user.notifications/>
        </div>

        <x-user.applications :applications="$applications"/>
        <x-user.latestjobs :jobs="$jobs"/>
      
      </div>


    </div>
  </section>
  <!-- End Dashboard -->
</x-user.layout>