@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Permission') }}
                    @can('role-create')
                        <span class="float-right">
                            <a class="btn btn-primary" href="{{ route('permissions.index') }}">{{ __('Back') }}</a>
                        </span>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="lead">
                        <strong>{{ __('Name') }}:</strong>
                        {{ $permission->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
