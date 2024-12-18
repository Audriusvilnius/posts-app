@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('message.Reservations') }}</h2>
                    @can('product-create')
                        <a class="btn btn-success btn-sm mb-2 px-4" href="{{ route('products.create') }}"><i
                                class="fa fa-plus me-2"></i>
                            {{ __('message.Create New Reservation') }}</a>
                    @endcan
                </div>
            </div>
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover">
                                <tr>
                                    <th scope="col">#</th>
                                    <th width="240px">{{ __('message.Date') }}</th>
                                    <th scope="col">{{ __('message.Title / Body') }}</th>
                                    <th width="280px" class=" align-content-center align-items-center">
                                        {{ __('message.Action') }}
                                    </th>
                                </tr>
                                @forelse ($products as $product)
                                    <tr>
                                        <th scope="row g-3">
                                            <smll class="text-muted fst-italic">
                                                {{ ++$i }}
                                            </smll>
                                        </th>
                                        <td>
                                            <small class="text-muted fst-italic">
                                                @if ($product->booked_from && $product->booked_to)
                                                    {{ \Carbon\Carbon::parse($product->booked_from)->format('Y-m-d H:i') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($product->booked_to)->format('Y-m-d H:i') }}
                                                @else
                                                    {{ __('message.Not booked') }}
                                                @endif
                                            </small>
                                            <small class="text-muted fst-italic">
                                                @if ($product->user_id)
                                                    {{ __('message.by') }} {{ $product->user->name }}
                                                @endif
                                            </small>
                                        </td>
                                        <td>
                                            <p>
                                                {!! nl2br($product->title) !!}
                                            </p>
                                            <small>
                                                {!! nl2br($product->detail) !!}
                                            </small>
                                        </td>
                                        <td class="align-middle">
                                            <div class="justify-content-center align-content-end d-flex gap-2">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('products.show', $product->id) }}"><i
                                                        class="fa-solid fa-list me-2"></i>{{ __('message.Show') }}</a>
                                                @can('product-edit')
                                                    <a class="btn btn-primary btn-sm px-2"
                                                        href="{{ route('products.edit', $product->id) }}"><i
                                                            class="fa-solid fa-pen-to-square me-2"></i>{{ __('message.Edit') }}</a>
                                                @endcan
                                                @can('product-delete')
                                                    <div class="">
                                                        <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#deleteProduct{{ $product->id }}"><i
                                                                class="fa-solid fa-trash me-2"></i>{{ __('message.Delete') }}</button>
                                                        </a>
                                                    </div>
                                                @endcan
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('products.modal.delete')
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center align-middle">
                                            <h3 class="p-3 fst-italic">
                                                {{ __('No reservations found!') }}
                                            </h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
