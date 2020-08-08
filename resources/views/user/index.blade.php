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
    </div>
@endsection
