@extends('layouts.admin.admin')

@section('title', 'Create a Blog')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('blog.form',['header' => 'Create a blog'])
            </form>
        </div>
    </section>
@endsection

