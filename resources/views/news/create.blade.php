@extends('layouts.admin.admin')

@section('title', 'Create a Notice or News')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('news.store')}}" method="POST" enctype="multipart/form-data" novalidate>
            @include('news.form',['header' => 'Create a Notice or News'])
            </form>
        </div>
    </section>
@endsection

