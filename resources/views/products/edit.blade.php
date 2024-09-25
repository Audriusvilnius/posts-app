@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('Edit Reservations') }}</h2>
                    <div class="pull-right">
                        <a class="btn btn-secondary btn-sm mb-2 px-4" href="{{ route('products.index') }}"><i
                                class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <strong>{{ __('Date and Time from') }}:</strong>
                                        <input type="datetime-local" name="booked_from" class="form-control"
                                            value="{{ old('booked_from', $product->booked_from) }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <strong>{{ __('Date and Time to') }}:</strong>
                                        <input type="datetime-local" name="booked_to" class="form-control"
                                            placeholder="date to" value="{{ old('booked_to', $product->booked_to) }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Detail:</strong>
                                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
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
