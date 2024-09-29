@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12 justify-content-between d-flex align-content-center align-items-center py-3">
                    <h2>{{ __('Users') }}</h2>
                    <a class="btn btn-success btn-sm mb-2 px-4" href="{{ route('users.create') }}"><i
                            class="fa fa-plus me-2"></i>
                        {{ __('Create New User') }}</a>
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
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Roles') }}</th>
                                    <th width="240px" class=" align-content-center align-items-center">{{ __('Action') }}
                                    </th>
                                </tr>
                                @forelse ($data as $key => $user)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge bg-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="justify-content-center align-content-end d-flex gap-2">
                                                {{-- <a class="btn btn-info btn-sm"
                                                    href="{{ route('users.show', $user->id) }}"><i
                                                        class="fa-solid fa-list"></i> {{__('Show')}}</a> --}}
                                                <a class="btn btn-primary btn-sm px-3"
                                                    href="{{ route('users.edit', $user->id) }}"><i
                                                        class="fa-solid fa-pen-to-square me-2"></i>{{ __('Edit') }}</a>
                                                <div class="">
                                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUser{{ $user->id }}"><i
                                                            class="fa-solid fa-trash me-2"></i>{{ __('Delete') }}</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('users.modal.delete')
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center align-middle">
                                            <h3 class="p-3 fst-italic">
                                                {{ __('No data found!') }}
                                            </h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
                {!! $data->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
