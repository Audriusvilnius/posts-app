@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('Role Managemen') }}t</h2>

                    @can('role-create')
                        <a class="btn btn-success btn-sm mb-2 px-4" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i>
                            {{ __('Create New Role') }}</a>
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
                                <tr <?= $counter = 0 ?>>
                                    <th width="100px">#</th>
                                    <th>Name</th>
                                    <th width="240px" class=" align-content-center align-items-center">Action</th>
                                </tr>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="align-middle">
                                            <div class="justify-content-center align-content-end d-flex gap-2">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('roles.show', $role->id) }}"><i
                                                        class="fa-solid fa-list"></i> Show</a>
                                                @can('role-edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('roles.edit', $role->id) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                @endcan
                                                @can('role-delete')
                                                    <div class="">
                                                        <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#deleteRoles{{ $role->id }}"><i
                                                                class="fa-solid fa-trash me-2"></i>{{ __('Delete') }}</button>
                                                        </a>
                                                    </div>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @include('roles.modal.delete')
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $roles->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>

@endsection
