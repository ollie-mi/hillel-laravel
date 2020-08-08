<?php
/**
 * @var $errors ViewErrorBag
 */

use Illuminate\Support\ViewErrorBag;

?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="insert-form">
            <div class="row">
                <div class="mx-auto my-5">
                    <h1 class="text-center mb-5">Create User</h1>
                    <form action="{{ route('user.store')}}" method="post" class="justify-content-center">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputLogin">Login</label>
                                <input type="text"
                                       class="form-control  @if($errors->has('login')) is-invalid @endif"
                                       id="inputLogin"
                                       name="login"
                                       value="{{ old('login') }}">

                                @if($errors->has('login'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('login') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword">Password</label>
                                <input type="password"
                                       class="form-control @if($errors->has('password')) is-invalid @endif"
                                       id="inputPassword"
                                       name="password">

                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="text"
                                       class="form-control @if($errors->has('email')) is-invalid @endif"
                                       id="inputEmail"
                                       name="email"
                                       placeholder="example@email.com"
                                       value="{{ old('email') }}">

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">Phone</label>
                                <input type="tel"
                                       class="form-control @if($errors->has('phone')) is-invalid @endif"
                                       id="inputPhone"
                                       name="phone"
                                       placeholder="380501234567" value="{{ old('phone') }}">

                                @if($errors->has('phone'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFirstName">First Name</label>
                            <input type="text"
                                   class="form-control @if($errors->has('first_name')) is-invalid @endif"
                                   name="first_name"
                                   id="inputFirstName"
                                   value="{{ old('first_name') }}">

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
                                   value="{{ old('last_name') }}">

                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBirthDay">Birthday</label>
                                <input type="date"
                                       class="form-control @if($errors->has('birthday')) is-invalid @endif"
                                       name="birthday"
                                       id="inputBirthDay"
                                       value="{{ old('birthday') }}">

                                @if($errors->has('birthday'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('birthday') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
