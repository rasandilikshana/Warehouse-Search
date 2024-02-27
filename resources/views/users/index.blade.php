@extends('layouts.app')

@section('title', 'User List')

@section('contents')
<div>
    <div class="d-flex align-items-center justify-content-between">
        <form class="form-inline" action="{{ route('users') }}" method="GET">
            <input type="text" class="form-control" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </form>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                {{-- <th>Id</th> --}}
                <th>Name</th>
                <th>Email</th>
                <th>Role Id</th>
                <th>Role Name</th>
                <th>Last Seen</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($user->count() > 0)
                @foreach($user as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->role_id }}</td>
                        <td class="align-middle">{{ $rs->role_name }}</td>
                        <td class="align-middle">{{ Carbon\Carbon::parse($rs->last_seen)->diffForHumans()}}</td>
                        <td class="align-middle">
                            <span class="py-1 px-2 rounded bg-gradient-{{$rs->last_seen>=now()->subMinutes(2) ? 'success' : 'danger'}} text-white">{{ $rs->last_seen >= now()->subMinutes(2) ? 'online' : 'offline' }}</span>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('users.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('users.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">user's not found</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{-- <div class="text-center mb-4">
        Showing {{ $user->firstItem() }} to {{ $user->lastItem() }} of {{ $user->total() }} results
    </div> --}}

    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $product->currentPage() == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $product->appends(['search' => request('search'), 'uom' => request('uom'), 'asset_type' => request('asset_type')])->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            @for($i = 1; $i <= $product->lastPage(); $i++)
                @if($i == 1 || $i == $product->lastPage() || ($i >= $product->currentPage() - 2 && $i <= $product->currentPage() + 2))
                    <li class="page-item {{ $i == $product->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $product->appends(['search' => request('search'), 'uom' => request('uom'), 'asset_type' => request('asset_type')])->url($i) }}">{{ $i }}</a>
                    </li>
                @elseif($i == $product->currentPage() - 3 || $i == $product->currentPage() + 3)
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">...</a>
                    </li>
                @endif
            @endfor

            <li class="page-item {{ $product->currentPage() == $product->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $product->appends(['search' => request('search'), 'uom' => request('uom'), 'asset_type' => request('asset_type')])->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav> --}}
</div>
@endsection
