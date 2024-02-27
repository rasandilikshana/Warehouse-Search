@extends('layouts.app')

@section('title', 'Create Service')

@section('contents')
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="code" class="form-control" placeholder="Code">
            </div>
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="uom" class="form-control" placeholder="Uom">
            </div>
            <div class="col">
                <input type="text" name="asset_type" class="form-control" placeholder="Asset Type">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="itemCat1Code" class="form-control" placeholder="itemCat1Code">
            </div>
            <div class="col">
                <input type="text" name="itemCat2Code" class="form-control" placeholder="itemCat2Code">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="itemCat3Code" class="form-control" placeholder="itemCat3Code">
            </div>
            <div class="col">
                <input type="text" name="itemCat7Code" class="form-control" placeholder="itemCat7Code">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="brand_code" class="form-control" placeholder="brand_code">
            </div>
            <div class="col">
                <input type="text" name="ean" class="form-control" placeholder="ean">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="access_level" class="form-control" placeholder="access_level">
            </div>
            <div class="col">
                <input type="text" name="is_active" class="form-control" placeholder="True">
            </div>
        </div>

        <div class="row">
            <div class="d-grid py-2 px-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
