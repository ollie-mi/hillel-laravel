<?php
/**
 * @var $user User;
 */

use App\Models\User;

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="insert-form">
            <div class="row">
                <div class="mx-auto my-5">
                    <h1 class="text-center mb-5">User profile</h1>
                    <div class="row">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th scope="row">User ID</th>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">User Full Name</th>
                                <td>{{$user->profile->userFullName()}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Login</th>
                                <td>{{$user->login}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>+{{$user->profile->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Birthday</th>
                                <td>{{$user->profile->birthdayFormat()}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{$user->status}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <a href="{{route('user.index')}}">Back to users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
