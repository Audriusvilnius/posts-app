@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12  d-flex justify-content-between align-content-center align-items-center">
                    <h2>{{ __('message.Reserve') }}</h2>
                    <a class="btn btn-secondary btn-sm px-3 " href="{{ route('products.index') }}"><i
                            class="fa fa-arrow-left me-2"></i>
                        {{ __('message.Back') }}</a>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>{{ __('message.Whoops!') }}</strong>
                {{ __('message.There were some problems with your input') }}.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="row g-4 mt-3">
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <strong>{{ __('message.Date and Time from') }}:</strong>
                                    <input type="datetime-local" name="booked_from" class="form-control"
                                        value="{{ old('booked_from', \Carbon\Carbon::now()->format('Y-m-d\TH:i')) }}"
                                        min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                            <div class="col-xs-12
                        col-sm-12 col-md-2">
                                <div class="form-group">
                                    <strong>{{ __('message.Date and Time to') }}:</strong>
                                    <input type="datetime-local" name="booked_to" class="form-control" placeholder="date to"
                                        value="{{ old('booked_to', \Carbon\Carbon::now()->addHours(1)->format('Y-m-d\TH:i')) }}"
                                        min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    <strong>{{ __('message.Title') }}:</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Title"
                                        value={{ old('title') }}>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('message.Body') }}</strong>
                                    <textarea class="form-control" style="height:250px" name="detail" placeholder="Descriptions"
                                        value="{{ old('detail') }}">{{ old('detail') }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex">
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
@endsection
