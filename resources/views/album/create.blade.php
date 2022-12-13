@extends('layouts.admin.admin')

@section('title', 'Create a Album')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('album.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('album.form',['header' => 'Create a album'])
            </form>
        </div>
    </section>
@endsection

