<div class="resume-block">
    <div class="collapse" id="addPortfolioForm">
        <blockquote class="blockquote-style-one mb-5 mt-5">
            <form class="default-form" method="post"
                action="{{ route('portfolio.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12 mb-3">
                        <input type="text" name="project_title"
                            class="form-control" id="floatingPassword" value="{{old('project_title')}}"
                            placeholder="{{ $errors->first('project_title') != '' ? $errors->first('project_title') : 'Project Title' }}">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12 mb-3">
                        <input type="text" name="project_role"
                            class="form-control" id="floatingPassword" value="{{old('project_role')}}"
                            placeholder="{{ $errors->first('project_role') != '' ? $errors->first('project_role') : 'Project Role' }}">
                    </div>


                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12 mb-3">
                        <input type="text" id="project_task"
                            name="project_task" class="form-control" value="{{old('project_task')}}"
                            placeholder="{{ $errors->first('project_task') != '' ? $errors->first('project_task') : 'Project Task' }}">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12 mb-3">
                        <input type="text" id="project_solution"
                            name="project_solution" class="form-control" value="{{old('project_solution')}}"
                            id="floatingPassword"
                            placeholder="{{ $errors->first('project_solution') != '' ? $errors->first('project_solution') : 'Project Solution' }}">
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <input type="text" id="project_url"
                            name="project_url" class="form-control"
                            id="floatingPassword" value="{{old('project_url')}}"
                            placeholder="{{ $errors->first('project_url') != '' ? $errors->first('project_url') : 'Project URL' }}">
                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                        <div class="uploading-outer">
                            <div class="uploadButton">
                                <input type="file" name="images[]" class="uploadButton-input" id="upload" multiple>
                                <label
                                    class="uploadButton-button ripple-effect"
                                    for="upload">Upload Portfolio
                                    Image</label>
                                <span class="uploadButton-file-name"></span>
                            </div>
                        </div>
                        @if ($errors->has('images.*'))
                            <span class="text-danger">{{ $errors->first('images.*') }}</span>
                        @endif
                    </div>

                    <!-- Input -->
                    <div class="form-group col-lg-6 col-md-12">
                        <button type="submit"
                            class="theme-btn btn-style-one">Save</button>
                    </div>
                </div>
            </form>
        </blockquote>

    </div>
</div>