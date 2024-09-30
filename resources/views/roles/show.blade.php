@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('message.Show Role') }}</h2>
                    <a class="btn btn-secondary px-4 mb-2" href="{{ route('roles.index') }}">{{ __('message.Back') }}</a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('message.Name') }}:</strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('message.Permissions') }}:</strong>
                                @if (!empty($rolePermissions))
                                    @foreach ($rolePermissions as $v)
                                        <label
                                            class="label label-success">{{ $v->name }}</label>{{ $loop->last ? '.' : ',' }}
                                    @endforeach
                                @else
                                    <small class="text-muted fst-italic">
                                        {{ __('message.No permissions found!') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
