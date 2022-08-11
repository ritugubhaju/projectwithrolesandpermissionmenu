@extends('layouts.admin.admin')

@section('title', 'Menu')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{ route('menu.subMenu.update', $subMenu->id) }}"
                method="POST" enctype="multipart/form-data" novalidate>
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card">
                            <div class="card-underline">
                                <div class="card-head m-2">
                                    <header>Edit SubMenu <span class="text text-danger font-weight-bolder">({{$subMenu->name}})</span> of Menu <span class="text text-success font-weight-bolder">({{$subMenu->menu->name}})</span> </header>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" required
                                                value="{{ old('name', isset($subMenu->name) ? $subMenu->name : '') }}" />

                                            <label for="Name">Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="number" name="order" class="form-control" required
                                                value="{{ old('order', isset($subMenu->order) ? $subMenu->order : '') }}" />

                                            <label for="Name">Order</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-actionbar-row">
                                    <a class="btn btn-default btn-ink" href="{{ route('menu.index') }}">
                                        <i class="md md-arrow-back"></i>
                                        Back
                                    </a>
                                    <input type="submit" name="pageSubmit" class="btn btn-info ink-reaction"
                                        value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop

@section('page-specific-styles')

    <link href="{{ asset('backend/css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endsection

@section('page-specific-scripts')
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/dropify/dropify.min.js') }}"></script>
@endsection
