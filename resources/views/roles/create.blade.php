@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row py-3">
                <div class="col-lg-4  d-flex justify-content-between align-content-center align-items-center m-auto">
                    <h2>{{ __('Create New Role') }}</h2>
                    <a class="btn btn-secondary btn-sm px-3 " href="{{ route('roles.index') }}"><i
                            class="fa fa-arrow-left me-2"></i>
                        {{ __('Back') }}</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 m-auto">
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
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 py-3">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach ($permission as $value)
                                        <label><input type="checkbox" name="permission[{{ $value->id }}]"
                                                value="{{ $value->id }}" class="name">
                                            {{ $value->name }}</label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex">
                                <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i
                                        class="fa-solid fa-floppy-disk me-2"></i>
                                    {{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endsection
