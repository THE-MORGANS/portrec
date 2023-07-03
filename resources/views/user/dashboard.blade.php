<x-user.layout>
    <div class="dashboard-tlbar d-block mb-5">
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12">
                <h1 class="ft-medium">Hello, {{ Auth::user()->name }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="theme-cl">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <div class="dashboard-widg-bar d-block">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="dash-widgets py-5 px-4 bg-purple rounded">
                    <h2 class="ft-medium mb-1 fs-xl text-light">{{count($applications)}}</h2>
                    <p class="p-0 m-0 text-light fs-md">Applied Jobs</p>
                    <i class="lni lni-empty-file"></i>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="dash-widgets py-5 px-4 bg-dark rounded">
                    <h2 class="ft-medium mb-1 fs-xl text-light">87</h2>
                    <p class="p-0 m-0 text-light fs-md">Notifications</p>
                    <i class="lni lni-users"></i>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            
            	
        </div>	
            
    </div>   
</x-user.layout>