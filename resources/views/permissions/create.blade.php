@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-4 justify-content-between d-flex align-content-center align-items-center py-3 m-auto">
                    <h2>{{ __('message.Add New Permission') }}</h2>
                    <a class="btn btn-secondary btn-sm mb-2 px-3" href="{{ route('permissions.index') }}"><i
                            class="fa fa-arrow-left me-2"></i>
                        {{ __('message.Back') }}</a>
                </div>
            </div>
            <div class="col-md-4 m-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>{{ __('message.Opps!') }}</strong>{{ __('message.Something went wrong, please check below errors.') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('message.Name') }}:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex py-3">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i
                                            class="fa-solid fa-floppy-disk me-2"></i>
                                        {{ __('message.Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
