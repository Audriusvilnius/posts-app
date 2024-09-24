@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permission</h2>
            </div>
            <div class="pull-right">
                @can('permission-create')
                    <a class="btn btn-success btn-sm mb-2" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i>
                        Create
                        New Permission</a>
                @endcan
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $permission)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info btn-sm" href="{{ route('permissions.show', $permission->id) }}"><i
                                class="fa-solid fa-list"></i> Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary btn-sm" href="{{ route('permissions.edit', $permission->id) }}"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                        @endcan

                        @can('permission-delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i
                                    class="fa-solid fa-trash"></i>Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->appends($_GET)->links() }}

@endsection
