@extends('layouts.app')

@section('content')
    @if (Session::has('ok'))
        <div class="col-md-12 mt-1 rounded m-auto text-center">
            <h6 class=" alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('ok') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h6>
        </div>
    @endif
    @if (Session::has('not'))
        <div class="col-md-12 mt-1 rounded m-auto text-center">
            <h6 class=" alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('not') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h6>
        </div>
    @endif
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession
    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="align-content-center align-items-center justify-center">
                {{ __('Klaida pateikiant duomenis') }}<br>
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-lg-12  d-flex justify-content-between align-content-center align-items-center">
            <h2>{{ __('Reserve') }}</h2>
            <a class="btn btn-secondary btn-sm px-3 " href="{{ route('products.index') }}"><i
                    class="fa fa-arrow-left me-2"></i>
                {{ __('Back') }}</a>
        </div>
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row g-4 mt-3">
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>{{ __('Date and Time from') }}:</strong>
                    <input type="datetime-local" name="booked_from" class="form-control"
                        value="{{ old('booked_from', now()->format('Y-m-d\TH:i')) }}"
                        min="{{ now()->format('Y-m-d\TH:i') }}">
                </div>
            </div>
            <div class="col-xs-12
                        col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>{{ __('Date and Time to') }}:</strong>
                    <input type="datetime-local" name="booked_to" class="form-control" placeholder="date to"
                        value="{{ old('booked_to', now()->format('Y-m-d\TH:i')) }}"
                        min="{{ now()->format('Y-m-d\TH:i') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="form-group">
                    <strong>{{ __('Title') }}:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value={{ old('name') }}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Body') }}</strong>
                    <textarea class="form-control" style="height:250px" name="detail" placeholder="Detail" value="{{ old('detail') }}"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center px-3 justify-content-end d-flex">
                <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk me-2"></i>
                    {{ __('Submit') }}</button>
            </div>
        </div>
    </form>
@endsection
