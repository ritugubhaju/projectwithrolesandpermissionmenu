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
                         <div class="col-sm-4">

                            <div class="form-group ">
                                <label for="title" class="col-form-label pt-0"> Title</label>
                                <div class="">
                                    <input class="form-control" type="text" required name="title" value="{{ old('title', isset($blog->title) ? $blog->title : '') }}" placeholder="Enter Your Title">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div class="form-group ">
                                <label for="date" class="col-form-label pt-0">Date</label>
                                <div class="">
                                    <input class="form-control" type="text" required name="date" value="{{ old('date', isset($blog->date) ? $blog->date : '') }}" placeholder="Enter Your Sub Title">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div class="form-group ">
                                <label for="date" class="col-form-label pt-0">Time</label>
                                <div class="">
                                    <input class="form-control" type="text" required name="date" value="{{ old('date', isset($blog->date) ? $blog->date : '') }}" placeholder="Enter Your Sub Title">
                                </div>
                            </div>

                        </div>

                       
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea name="content" id=""
                                          class="ckeditor">{{old('content',isset($blog->content)?$blog->content : '')}}</textarea>

                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
        <div class="card">
            <div class="card-underline">  
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong>Meta Description</strong>
                                <textarea cols="50" name="meta_description" class="form-control"
                                          >{{old('meta_description',isset($blog->meta_description)?$blog->meta_description : '')}}</textarea>

                            </div>
                        </div>

                        <div class="col-sm-4">

                            <div class="form-group ">
                                <label for="date" class="col-form-label pt-0">Content Writer</label>
                                <div class="">
                                    <input class="form-control" type="text" required name="date" value="{{ old('date', isset($blog->date) ? $blog->date : '') }}" placeholder="Enter Your Sub Title">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div class="form-group ">
                                <label for="date" class="col-form-label pt-0">Place</label>
                                <div class="">
                                    <input class="form-control" type="text" required name="date" value="{{ old('date', isset($blog->date) ? $blog->date : '') }}" placeholder="Enter Your Sub Title">
                                </div>
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
                            <input type="checkbox" id="switch1" switch="none" name="is_published" {{ old('is_published', isset($blog->is_published) ? $blog->is_published : '')=='active' ? 'checked':'' }}/>
                            <label for="switch1" class="ml-auto" data-on-label="On" data-off-label="Off"></label>
                        </div>
                    </div>
                </div>

               
                <div class="row">
                    <div class="col-sm-12">
                        <label class="text-default-light">Image</label>
                        @if(isset($blog->image))
                        <img id="holder" style="margin-top:15px;max-height:300px;" class="img img-fluid" src="{{$blog->image}}">
                        @endif
                    <input id="image" class="form-control" type="text" name="image" readonly  value="{{ old('image', isset($blog->image) ? $blog->image : '') }}">
                                 <br>
                                 <button class="lfm" data-input="image" data-preview="holder" class="btn btn-icon icon-left btn-primary mt-2">
                                        <i class="fa fa-upload"></i> &nbsp;Upload Your Image
                                    </button>
                    <span id="textarea1-error" class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                </div>

                <hr>
                <div class="row mt-2 justify-content-center">
                    <div class="form-group">
                        <div>
                            <a class="btn btn-light waves-effect ml-1" href="{{ route('blog.index') }}">
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
