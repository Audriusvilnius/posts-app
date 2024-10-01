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
                            @forelse ($my_Checks as $product)
                                <div id={{ $product->id }}>
                                    @if ($product->booked_from_date === $product->booked_to_date)
                                        <h3 class="py-2"> {{ $product->name }}</h3>
                                        <h5 class=" fst-italic">
                                            {{ $product->booked_from_date }}
                                            {{ __('message.from') }}
                                            {{ \Carbon\Carbon::parse($product->booked_from_hours)->format('H:i') }}
                                            {{ __('message.to') }}
                                            {{ \Carbon\Carbon::parse($product->booked_to_hours)->format('H:i') }}
                                        </h5>
                                        <span class="d-inline-block text-truncate">
                                            {{ $product->detail }}</span>
                                        <p class="text-muted fst-italic">
                                            {{ __('message.All registered participants') }}:
                                            {{ $product->user_checked }}
                                        </p>
                                        <small class="text-muted fst-italic">
                                            {{ __('message.Conference lecturer') }}:
                                            {{ $product->user->name }}</small>
                                        <form method="POST" action="{{ route('product-checkin', $product->id) }}"
                                            class=" justify-content-end d-flex">
                                            @method('POST')
                                            @csrf
                                            <button class="button special"
                                                type="submit">{{ __('message.Leave') }}</button>
                                        </form>
                                    @else
                                        <h3 class="py-2"> {{ $product->name }}</h3>
                                        <h5 class=" fst-italic">
                                            {{ $product->booked_from_date }} {{ __('message.from') }}
                                            {{ \Carbon\Carbon::parse($product->booked_from_hours)->format('H:i') }}
                                            {{ __('message.until') }}
                                            {{ $product->booked_to_date }} {{ __('message.to') }}
                                            {{ \Carbon\Carbon::parse($product->booked_to_hours)->format('H:i') }}
                                        </h5>
                                        <div class="col-12 text-truncate">
                                            {{ $product->detail }}
                                        </div>

                                        <p class="text-muted fst-italic">
                                            {{ __('message.All registered participants') }}:
                                            {{ $product->user_checked }}
                                        </p>
                                        <small class="text-muted fst-italic">
                                            {{ __('message.Conference lecturer') }}:
                                            {{ $product->user->name }}</small>
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
                                <p>{{ __('message.No Products') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
