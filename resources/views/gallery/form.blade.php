@section('page-specific-styles')
    <link href="{{ asset('css/dropify.min.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
          href="{{ asset('resources/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862')}}"/>
@endsection
@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head">
                    <header class="ml-3 mt-2">{!! $header !!}</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="album_id" class="col-form-label pt-0">Album</label>
                                <select name="album_id" class="form-control" required id="album_id">
                                <option value="">Select Album</option>
                                        @foreach($albums as $album)
                                            <option value="{{$album->id}}" @if(isset($album_search)) @if($album_search->id == $album->id) selected @endif @endif>{{$album->title}}</option>
                                        @endforeach
                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('album_id') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="title" class="col-form-label pt-0">Gallery Name</label>
                                <div class="">
                                    <input class="form-control" type="text"  name="title" value="{{ old('title', isset($gallery->title) ? $gallery->title : '') }}" placeholder="Enter Your Name">
                                </div>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12" id="videourl" @if(isset($gallery->url)) style ="display: block" @else style="display: none" @endif>
                            <div class="form-group">
                                <label for="url" class="col-form-label pt-0">Video URL</label>
                                <div class="form-group">
                                    <input type="text" name="url" class="form-control" required
                                            value="{{ old('url', isset($gallery->url) ? $gallery->url : '') }}"/>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row" id="imageupload" @if(isset($gallery->url)) style="display:none" @endif>
                            <div class="col-sm-12">
                                <label class="text-default-light">Image</label>
                                @if(isset($gallery->image))
                        <img id="holder" style="margin-top:15px;max-height:300px;" class="img img-fluid" src="{{$gallery->image}}">
                        @endif
                    <input id="image" class="form-control" type="text" name="image" readonly  value="{{ old('image', isset($gallery->image) ? $gallery->image : '') }}">
                                    <button class="lfm" data-input="image" data-preview="holder" class="btn btn-icon icon-left btn-primary mt-2">
                                        <i class="fa fa-upload"></i> &nbsp;Choose
                                    </button>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea name="meta_description" id=""
                                          class="ckeditor">{{old('meta_description',isset($gallery->meta_description)?$gallery->meta_description : '')}}</textarea>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group d-flex">
                            <span class="pl-1">Status</span>
                            <input type="checkbox" id="switch1" switch="none" name="is_published" {{ old('is_published', isset($gallery->is_published) ? $gallery->is_published : '')=='active' ? 'checked':'' }}/>
                            <label for="switch1" class="ml-auto" data-on-label="On" data-off-label="Off"></label>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row mt-2 justify-content-center">
                    <div class="form-group">
                        <div>
                            <a class="btn btn-light waves-effect ml-1" href="{{ route('gallery.index') }}">
                                <i class="md md-arrow-back"></i>
                                Back
                            </a>
                            <input type="submit" name="pageSubmit" class="btn btn-danger waves-effect waves-light" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@section('page-specific-scripts')
    <script src="{{asset('resources/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script src="{{ asset('resources/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('resources/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
