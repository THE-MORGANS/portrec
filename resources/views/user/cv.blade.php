<x-user.layout>
    <!-- Dashboard -->
    <section class="user-dashboard">
      <div class="dashboard-outer">        
        <div class="upper-title-box">
          <h3> CV </h3>
        </div>

        <div class="row">

            <div class="col-lg-12">
              <!-- CV Manager Widget -->
              <div class="cv-manager-widget ls-widget">
                <div class="widget-title">
                  <h4>Cv Manager</h4>
                </div>
                <div class="widget-content">
                  
                  <form action="{{route('cv.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="uploading-resume">
                      <div class="uploadButton">
                        <input class="uploadButton-input" type="file" name="cv" accept="application/pdf" id="upload">
                        <label class="cv-uploadButton" for="upload">
                          <span class="title">Click here to upload CV</span>
                          <span class="text">To upload file size is (Max 25MB) and allowed file types are (.jpg & .pdf)</span>
                          @if ($errors->has('cv'))
                          <span class="text-danger">{{ $errors->first('cv') }}</span>
                        @endif
                        </label>
                        <span class="uploadButton-file-name"></span>
                      </div>
                    </div>

                    <div class="mb-5 text-right w-100">
                      <button type="submit" class="theme-btn btn-style-one">Upload Resume</button>
                    </div>
                  </form>
                  
                  <div class="files-outer">
                    @if (count($cvs)>0)
                    @foreach ($cvs as $cv)
                    <div class="file-edit-box">
                      <span class="title">{{$cv->doc_name}}</span>
                      <div class="edit-btns">
                        <a href="{{url($cv->doc_url)}}" download class="btn btn-sm btn-outline-primary mx-1"> <span class="la la-cloud-download"></span> </a>
                        <a href="{{ route('cv.delete', [$cv->id]) }}"
                          class="btn btn-sm btn-outline-danger"
                          onclick="return confirm('Are you sure, you want to delete it?')"><span
                              class="la la-trash"></span></a>
                      </div>
                    </div> 
                    @endforeach
                    @else
                        <span class="small text-danger">No CV Found</span>
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        
    </section>
    <!-- End Dashboard -->
  </x-user.layout>