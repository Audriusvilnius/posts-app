@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row py-3">
                <div class="col-lg-6  d-flex justify-content-between align-content-center align-items-center m-auto">
                    <h2>{{ __('message.Edit Role') }}</h2>
                    <a class="btn btn-secondary btn-sm mb-2 px-3" href="{{ route('roles.index') }}"><i
                            class="fa fa-arrow-left me-2 "></i>
                        {{ __('message.Back') }}</a>
                </div>
            </div>

            <div class="col-md-6 m-auto">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{ __('message.Whoops!') }}</strong>{{ __('message.There were some problems with your input') }}.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group py-4">
                                    <strong>{{ __('message.Name') }}:</strong>
                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                        value="{{ $role->name }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('message.Permission') }}:</strong>
                                    <br />

                                    <div class="row ps-3 py-3">
                                        @foreach ($permission as $i => $value)
                                            @if ($i % 2 == 0)
                                                <div class="col-md-6 d-inline-flex">
                                                    <input type="checkbox" name="permission[{{ $value->id }}]"
                                                        value="{{ $value->id }}" class="form-check-input"
                                                        id="flexCheckDefault{{ $i }}"
                                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $i }}">
                                                        {{ $value->name }}</label>
                                                </div>
                                            @else
                                                <div class="col-md-6 d-inline-flex">
                                                    <input type="checkbox" name="permission[{{ $value->id }}]"
                                                        value="{{ $value->id }}" class="form-check-input"
                                                        id="flexCheckDefault{{ $i }}"
                                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $i }}">
                                                        {{ $value->name }}</label>
                                                </div>
                                            @endif
                                            <br />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex ">
                                <button type="submit" class="btn btn-success btn-sm text-white"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-floppy-fill me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
                                        <path
                                            d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
                                    </svg>
                                    {{ __('message.Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
