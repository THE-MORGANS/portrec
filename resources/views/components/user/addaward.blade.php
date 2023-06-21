<div class="resume-block">
    <div class="collapse" id="addAwardForm">
        <blockquote class="blockquote-style-one mb-5 mt-5">
            <form class="default-form" method="post"
                action="{{ route('award.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Input -->
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <input type="text" name="award_title"
                            class="form-control" id="floatingPassword" value="{{old('award_title')}}"
                            placeholder="{{ $errors->first('award_title') != '' ? $errors->first('award_title') : 'Award Title' }}">
                            @if ($errors->has('award_title'))
                                <span class="text-danger">{{ $errors->first('award_title') }}</span>
                            @endif
                    </div>

                     <!-- Input -->
                     <div class="form-group col-lg-6 col-md-12 mb-3">
                        <select class="chosen-select" name="award_type" style="display: none;">
                            <option value="">Select Award Type</option>
                            @foreach ($awardtypes as $award)
                            <option value="{{$award->id}}">{{ucfirst($award->name)}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('award_type_id'))
                                <span class="text-danger">{{ $errors->first('award_type_id') }}</span>
                            @endif
                    </div>

                     <!-- Input -->
                     <div class="form-group col-lg-6 col-md-12 mb-3">
                        <input type="text" name="issue_date" id="awardissuedate"
                            class="form-control" id="floatingPassword" value="{{old('issue_date')}}"
                            placeholder="{{ $errors->first('issue_date') != '' ? $errors->first('issue_date') : 'Issue Date' }}">
                            @if ($errors->has('issue_date'))
                                <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                            @endif
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                        <button type="submit" class="theme-btn btn-style-one">Save</button>
                    </div>
                </div>
            </form>
        </blockquote>

    </div>
</div>