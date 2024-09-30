@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('message.Permission') }}</h2>
                    @can('permission-create')
                        <a class="btn btn-success btn-sm mb-2 px-4"href="{{ route('permissions.create') }}"><i
                                class="fa fa-plus me-2"></i>
                            {{ __('message.Create New Permission') }}</a>
                    @endcan
                </div>
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
                                <th cope="col">ID</th>
                                <th cope="col">{{ __('message.Details') }}</th>
                                <th width="240px" class=" align-content-center align-items-center">{{ __('Action') }}</th>
                            </tr>
                            @forelse ($data as $key => $permission)
                                <tr>
                                    <th scope="row">
                                        <smll class="text-muted fst-italic">
                                            {{ $key + 1 }}
                                        </smll>
                                    </th>
                                    <td> <small class="text-muted fst-italic">{{ $permission->id }}</small></td>
                                    <td>{{ $permission->name }}</td>

                                    <td class="align-middle">
                                        <div class="justify-content-center align-content-end d-flex gap-2">
                                            {{-- <a class="btn btn-info btn-sm"
                                            href="{{ route('permissions.show', $permission->id) }}"><i
                                            class="fa-solid fa-list"></i> Show</a> --}}
                                            @can('product-edit')
                                                <a class="btn btn-primary btn-sm px-3"
                                                    href="{{ route('permissions.edit', $permission->id) }}"><i
                                                        class="fa-solid fa-pen-to-square me-2"></i>
                                                    {{ __('message.Edit') }}</a>
                                            @endcan

                                            @can('permission-delete')
                                                <div class="">
                                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deletePermission{{ $permission->id }}"><i
                                                            class="fa-solid fa-trash me-2"></i>{{ __('message.Delete') }}</button>
                                                    </a>
                                                </div>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @include('permissions.modal.delete')
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center align-middle">
                                        <h3 class="p-3 fst-italic">
                                            {{ __('message.No reservations found!') }}
                                        </h3>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        {{ $data->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
