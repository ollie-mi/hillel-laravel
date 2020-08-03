@extends('layouts.app')

@section('content')
    <div class="container">
        <diw class="row">
            <a href="{{ route('blog.create') }}" class="btn-info">Create</a>
        </diw>
        <div class="row">
            It`s blog index page
        </div>
    </div>
@endsection
