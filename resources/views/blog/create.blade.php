<?php
/**
 * @var $errors \Illuminate\Support\ViewErrorBag
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('blog.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>

                <input type="text"
                       class="form-control @if($errors->has('title')) is-invalid @endif" id="title"
                       name="title"
                       value="{{ old('title') }}">

                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="title">Email</label>

                <input type="text"
                       class="form-control @if($errors->has('email')) is-invalid @endif" id="email"
                       name="email"
                       value="{{ old('email') }}">

                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
