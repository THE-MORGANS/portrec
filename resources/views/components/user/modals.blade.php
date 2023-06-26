
<!-- Education Modal-->
<div class="modal fade" id="addEducation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="default-form" method="post" action="{{route('education.store')}}">
                    @csrf
                    <div class="row">
                        <!-- Input -->
                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                <input type="text" name="institution" class="form-control" id="floatingPassword" placeholder="{{ $errors->first('institution') != '' ? $errors->first('institution') : 'Institution' }}">
                              </div>

                        <!-- Input -->
                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                <input type="text" name="qualification" class="form-control" id="floatingPassword" placeholder="{{ $errors->first('qualification') != '' ? $errors->first('qualification') : 'Qualification' }}">
                            </div>

                        
                        <!-- Input -->
                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                <input type="text" id="startdate" name="start_date" class="form-control" placeholder="{{ $errors->first('start_date') != '' ? $errors->first('start_date') : 'Start Date' }}">
                              </div>

                         <!-- Input -->
                            <div class="form-group col-lg-6 col-md-12 mb-3">
                                <input type="text" id="enddate" name="end_date" class="form-control" id="floatingPassword" placeholder="{{ $errors->first('end_date') != '' ? $errors->first('end_date') : 'End Date' }}">
                            </div>

                            <!-- Input -->
                            <div class="form-group col-lg-12 col-md-12 mb-3">
                                <textarea class="form-group" name="description" placeholder="{{ $errors->first('description') != '' ? $errors->first('description') : 'Give a Brief Description of your Role' }}" id="floatingTextarea"></textarea>
                            </div>
                       
                        <!-- Input -->
                        <div class="form-group col-lg-6 col-md-12">
                            <button type="submit" class="theme-btn btn-style-one">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $( function() {
      $( "#startdate" ).datetimepicker({
        ownerDocument: document,
        contentWindow: window,
        format:'Y-m-d',
        timepicker:false,
        datepicker:true,
      });

      $( "#enddate" ).datetimepicker({
        ownerDocument: document,
        contentWindow: window,
        format:'Y-m-d',
        timepicker:false,
        datepicker:true,
      });

      $( "#awardissuedate" ).datetimepicker({
        ownerDocument: document,
        contentWindow: window,
        format:'Y-m-d',
        timepicker:false,
        datepicker:true,
      });

      $( "#dob" ).datetimepicker({
        ownerDocument: document,
        contentWindow: window,
        format:'d M, Y',
        timepicker:false,
        datepicker:true,
      });
    } );
    </script>
