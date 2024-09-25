@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-6 justify-content-between d-flex align-content-center align-items-center py-3 m-auto">
                    <h2>{{ __('Edit User') }}</h2>
                    <div class="pull-right">
                        <a class="btn btn-secondary btn-sm mb-2 px-3" href="{{ route('users.index') }}"><i
                                class="fa fa-arrow-left me-2"></i>{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" placeholder="Name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" placeholder="Email" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        <input type="password" name="confirm-password" placeholder="Confirm Password"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        <select name="roles[]" class="form-select">
                                            @foreach ($roles as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex py-3">
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
    </div>
@endsection
