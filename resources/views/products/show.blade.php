@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('Show Reservation') }}</h2>
                    <a class="btn btn-secondary btn-sm mb-2 px-4" href="{{ route('products.index') }}">{{ __('Back') }}</a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <small class="text-muted fst-italic">
                                @if ($product->booked_from && $product->booked_to)
                                    {{ \Carbon\Carbon::parse($product->booked_from)->format('Y-m-d H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($product->booked_to)->format('Y-m-d H:i') }}
                                @else
                                    {{ __('Not booked') }}
                                @endif
                            </small>
                            <small class="text-muted fst-italic">
                                @if ($product->user_id)
                                    {{ __('by') }} {{ $product->user->name }}
                                @endif
                            </small>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Title') }}: </strong>
                                {!! nl2br($product->name) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Body') }}:</strong>
                                {!! nl2br($product->detail) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
