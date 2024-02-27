@extends('layouts.app')

@section('title', 'Service List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <form class="form-inline" action="{{ route('services') }}" method="GET">
            <input type="text" class="form-control" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </form>
        <form action="{{ route('services.upload.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel_file" class="border border-gray-300 rounded-lg cursor-pointer">
            <button type="submit" class="btn btn-success">Upload Excel</button>
        </form>
        <a href="{{ route('services.export.excel') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
        <a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                {{-- <th>Id</th> --}}
                <th>Code</th>
                <th>Name</th>
                <form class="form-inline" action="{{ route('services') }}" method="GET">
                    <div class="input-group-append mb-1 justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i> Filter
                        </button>
                    </div>
                    <th>
                    <!-- Uom Dropdown -->
                        <select class="form-control" name="uom">
                            <option value="">Uom</option>
                            @foreach($uomOptions as $uom)
                                <option value="{{ $uom }}" {{ ($uom === 'DefaultUOM') ? 'selected' : '' }}>{{ $uom }}</option>
                            @endforeach
                        </select>
                    </th>
                    <!-- Asset Type Dropdown -->
                    <th>
                        <select class="form-control" name="asset_type">
                            <option value="">Asset Type</option>
                                @foreach($assetTypeOptions as $assetType)
                                    <option value="{{ $assetType }}" {{ ($assetType === 'DefaultAssetType') ? 'selected' : '' }}>{{ $assetType }}</option>
                                @endforeach
                        </select>
                    </th>
                </form>
                {{-- <th>itemCat1Code</th>
                <th>itemCat2Code</th>
                <th>itemCat3Code</th>
                <th>itemCat7Code</th>
                <th>brand_code</th>
                <th>ean</th>
                <th>access_level</th>
                <th>is_active</th> --}}
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($service->count() > 0)
                @foreach($service as $rs)
                    <tr>
                        {{-- <td class="align-middle">{{ $loop->iteration }}</td> --}}
                        <td class="align-middle">{{ $rs->code }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->uom }}</td>
                        <td class="align-middle">{{ $rs->asset_type }}</td>
                        {{-- <td class="align-middle">{{ $rs->itemCat1Code }}</td>
                        <td class="align-middle">{{ $rs->itemCat2Code }}</td>
                        <td class="align-middle">{{ $rs->itemCat3Code }}</td>
                        <td class="align-middle">{{ $rs->itemCat7Code }}</td>
                        <td class="align-middle">{{ $rs->brand_code }}</td>
                        <td class="align-middle">{{ $rs->ean }}</td>
                        <td class="align-middle">{{ $rs->access_level }}</td>
                        <td class="align-middle">{{ $rs->is_active }}</td> --}}
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('services.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('services.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('services.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">Service not found</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="text-center mb-4">
        Showing {{ $service->firstItem() }} to {{ $service->lastItem() }} of {{ $service->total() }} results
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $service->currentPage() == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $service->appends(['search' => request('search'), 'uom' => request('uom'), 'asset_type' => request('asset_type')])->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            @for($i = 1; $i <= $service->lastPage(); $i++)
                @if($i == 1 || $i == $service->lastPage() || ($i >= $service->currentPage() - 2 && $i <= $service->currentPage() + 2))
                    <li class="page-item {{ $i == $service->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $service->appends(['search' => request('search'), 'uom' => request('uom'), 'asset_type' => request('asset_type')])->url($i) }}">{{ $i }}</a>
                    </li>
                @elseif($i == $service->currentPage() - 3 || $i == $service->currentPage() + 3)
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">...</a>
                    </li>
                @endif
            @endfor

            <li class="page-item {{ $service->currentPage() == $service->lastPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $service->appends(['search' => request('search'), 'uom' => request('uom'), 'asset_type' => request('asset_type')])->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
