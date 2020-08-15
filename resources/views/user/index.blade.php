<?php
/**
 * @var $users User[];
 */

use App\Models\User;

?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mx-auto my-5">
                <h1 class="text-center mb-5">CRUD User</h1>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.create') }}">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.select') }}">Show User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.select_user') }}">Update User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.delete') }}">Delete User</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
{{--            @if($users->isNotEmpty())--}}
            @if(!empty($users))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->profile->userFullName()}}</td>
                            <td>{{$user->login}}</td>
                            <td>{{$user->email}}</td>
                            <td>+{{$user->profile->phone}}</td>
                            <td>{{$user->profile->birthdayFormat()}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->created_at}}</td>
                            <td><a class="badge badge-primary" href="{{ route('user.show', $user->id) }}">Show
                                    User</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
