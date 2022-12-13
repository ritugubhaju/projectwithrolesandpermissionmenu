@extends('layouts.admin.admin')

@section('title', 'Create a About')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('about.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('about.form',['header' => 'Create a about'])
            </form>
        </div>
    </section>
@endsection

