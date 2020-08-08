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
                    <h1 class="text-center mb-5">Select User ID for delete</h1>
                    <form action="{{ route('user.destroy')}}" method="post" class="form-inline">
                        @method('DELETE')
                        @csrf
                        <div class="form-group mx-sm-3 mb-2 position-relative">
                            <label for="inputId" class="sr-only">User ID</label>
                            <input type="text"
                                   class="form-control  @if($errors->has('userId')) is-invalid @endif"
                                   id="userId"
                                   name="userId"
                                   placeholder="User ID"
                                   value="{{ old('userId') }}">

                            @if($errors->has('userId'))
                                <div class="invalid-tooltip">
                                    {{ $errors->first('userId') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Show User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
