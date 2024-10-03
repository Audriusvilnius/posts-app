@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('message.Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="content">
                            @forelse ($products as $product)
                                <div id={{ $product->id }}>
                                    @if ($product->booked_from_date === $product->booked_to_date)
                                        <strong class="py-2">
                                            {{ __('message.guest') }}:
                                        </strong>
                                        <span class=" fw-lighter fst-italic">
                                            {{ $product->name }}
                                        </span>
                                        <div>
                                            <strong class="py-2">{{ __('message.Title') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->title }}
                                                </span>
                                            </strong>
                                        </div>
                                        <strong class="py-2">{{ __('message.Date') }}:
                                            <span class=" fw-lighter fst-italic">
                                                {{ $product->booked_from_date }}
                                                {{ __('message.from') }}
                                                {{ \Carbon\Carbon::parse($product->booked_from_hours)->format('H:i') }}
                                                {{ __('message.to') }}
                                                {{ \Carbon\Carbon::parse($product->booked_to_hours)->format('H:i') }}
                                            </span>
                                        </strong>
                                        <div class="col-12 text-truncate">
                                            <strong class="py-2"> {{ __('message.Conference lecturer') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->owner }}
                                                </span>
                                            </strong>
                                        </div>
                                        <div class="col-12 text-truncate">
                                            <strong class="py-2"> {{ __('message.All registered participants') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->user_checked }}
                                                </span>
                                            </strong>
                                        </div>
                                        <form method="POST" action="{{ route('product-checkin', $product->id) }}"
                                            class=" justify-content-end d-flex">
                                            @method('POST')
                                            @csrf
                                            <button class="button special"
                                                type="submit">{{ __('message.Leave') }}</button>
                                        </form>
                                    @else
                                        <strong class="py-2">
                                            {{ __('message.guest') }}:
                                        </strong>
                                        <span class=" fw-lighter fst-italic">
                                            {{ $product->name }}
                                        </span>
                                        <div>
                                            <strong class="py-2">{{ __('message.Title') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->title }}
                                                </span>
                                            </strong>
                                        </div>
                                        <strong class="py-2">{{ __('message.Date') }}:
                                            <span class=" fw-lighter fst-italic">
                                                {{ $product->booked_from_date }} {{ __('message.from') }}
                                                {{ \Carbon\Carbon::parse($product->booked_from_hours)->format('H:i') }}
                                                {{ __('message.until') }}
                                                {{ $product->booked_to_date }} {{ __('message.to') }}
                                                {{ \Carbon\Carbon::parse($product->booked_to_hours)->format('H:i') }}
                                            </span>
                                        </strong>
                                        <div class="col-12 text-truncate">
                                            <strong class="py-2">{{ __('message.Body') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->detail }}
                                                </span>
                                            </strong>
                                        </div>
                                        <div class="col-12 text-truncate">
                                            <strong class="py-2"> {{ __('message.Conference lecturer') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->owner }}
                                                </span>
                                            </strong>
                                        </div>
                                        <div class="col-12 text-truncate">
                                            <strong class="py-2"> {{ __('message.All registered participants') }}:
                                                <span class=" fw-lighter fst-italic">
                                                    {{ $product->user_checked }}
                                                </span>
                                            </strong>
                                        </div>
                                        <form method="POST" action="{{ route('product-checkin', $product->id) }}"
                                            class=" justify-content-end d-flex">
                                            @method('POST')
                                            @csrf
                                            <button class="button special"
                                                type="submit">{{ __('message.Leave') }}</button>
                                        </form>
                                    @endif
                                </div>
                                @if (!$loop->last)
                                    {{-- This is the last iteration --}}
                                    <hr class="py-4">
                                @endif
                            @empty
                                <h3 class="text-center fst-italic">{{ __('message.No events found!') }}</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
