@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Code</label>
            <input type="text" name="code" class="form-control" placeholder="Code" value="{{ $product->code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Product Code</label>
            <input type="text" name="uom" class="form-control" placeholder="Product Code" value="{{ $product->uom }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Asset Type</label>
            <input type="text" name="asset_type" class="form-control" placeholder="Asset Type" value="{{ $product->asset_type }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">itemCat1Code</label>
            <input type="text" name="itemCat1Code" class="form-control" placeholder="itemCat1Code" value="{{ $product->itemCat1Code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">itemCat2Code</label>
            <input type="text" name="itemCat2Code" class="form-control" placeholder="itemCat2Code" value="{{ $product->itemCat2Code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">itemCat3Code</label>
            <input type="text" name="itemCat3Code" class="form-control" placeholder="itemCat3Code" value="{{ $product->itemCat3Code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">itemCat7Code</label>
            <input type="text" name="itemCat7Code" class="form-control" placeholder="itemCat7Code" value="{{ $product->itemCat7Code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">brand_code</label>
            <input type="text" name="brand_code" class="form-control" placeholder="brand_code" value="{{ $product->brand_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">ean</label>
            <input type="text" name="ean" class="form-control" placeholder="ean" value="{{ $product->ean }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">access_level</label>
            <input type="text" name="access_level" class="form-control" placeholder="access_level" value="{{ $product->access_level }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">is_active</label>
            <input type="text" name="is_active" class="form-control" placeholder="is_active" value="{{ $product->is_active }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
    <div class="row py-2 px-3">
        <div class="d-grid pr-2">
            <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
