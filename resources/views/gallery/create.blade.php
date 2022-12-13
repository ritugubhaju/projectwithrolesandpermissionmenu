@extends('layouts.admin.admin')

@section('title', 'Create a Gallery')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('gallery.form',['header' => 'Create a gallery'])
            </form>
        </div>
    </section>
@endsection

