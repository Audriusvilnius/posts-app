@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-6  d-flex justify-content-between align-content-center align-items-center m-auto">
                    <h2>{{ __('Create New Use') }}</h2>
                    <a class="btn btn-secondary btn-sm px-3 " href="{{ route('users.index') }}"><i
                            class="fa fa-arrow-left me-2"></i>
                        {{ __('Back') }}</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 m-auto">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>{{ __('Whoops!') }}</strong>{{ __('There were some problems with your input') }}.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('Name') }}:</strong>
                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('Email') }}:</strong>
                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('Password') }}:</strong>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>{{ __('Confirm Password') }}:</strong>
                                    <input type="password" name="confirm-password" placeholder="Confirm Password"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <strong>{{ __('Role') }}:</strong>
                                    <select name="roles[]" class="form-select">
                                        @foreach ($roles as $value => $label)
                                            <option value="{{ $value }}">
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex">
                                <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i
                                        class="fa-solid fa-floppy-disk me-2"></i>
                                    {{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
