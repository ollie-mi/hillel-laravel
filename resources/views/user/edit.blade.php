<?php
/**
 * @var $errors ViewErrorBag
 * @var $user User;
 */

use App\Models\User;
use Illuminate\Support\ViewErrorBag;

?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="insert-form">
            <div class="row">
                <div class="mx-auto my-5">
                    <h1 class="text-center mb-5">Update User {{ $user->id }}</h1>
                    <form action="{{ route('user.update', $user)}}" method="post"
                          class="justify-content-center">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="inputFirstName">First Name</label>
                            <input type="text"
                                   class="form-control @if($errors->has('first_name')) is-invalid @endif"
                                   name="first_name"
                                   id="inputFirstName"
                                   value="{{ old('first_name', $user->profile->first_name) }}">

                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputLastName">Last Name</label>
                            <input type="text"
                                   class="form-control @if($errors->has('last_name')) is-invalid @endif"
                                   name="last_name"
                                   id="inputLastName"
                                   value="{{ old('last_name', $user->profile->last_name) }}">

                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputBirthDay">Birthday</label>
                            <input type="date"
                                   class="form-control @if($errors->has('birthday')) is-invalid @endif"
                                   name="birthday"
                                   id="inputBirthDay"
                                   value="{{ old('birthday', $user->profile->birthday) }}">

                            @if($errors->has('birthday'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('birthday') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
