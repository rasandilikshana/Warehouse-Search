@extends('layouts.app')

@section('title', 'Show Item Process')

@section('contents')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Code</label>
            <input type="text" name="code" class="form-control" placeholder="" value="{{ $itemprocess->code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="" value="{{ $itemprocess->name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Product Code</label>
            <input type="text" name="uom" class="form-control" placeholder="" value="{{ $itemprocess->uom }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Asset Type</label>
            <input type="text" name="asset_type" class="form-control" placeholder="" value="{{ $itemprocess->asset_type }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">itemCat1Code</label>
            <input type="text" name="itemCat1Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat1Code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">itemCat2Code</label>
            <input type="text" name="itemCat2Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat2Code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">itemCat3Code</label>
            <input type="text" name="itemCat3Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat3Code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">itemCat4Code</label>
            <input type="text" name="itemCat4Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat4Code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">itemCat5Code</label>
            <input type="text" name="itemCat5Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat5Code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">itemCat6Code</label>
            <input type="text" name="itemCat6Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat6Code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">itemCat7Code</label>
            <input type="text" name="itemCat7Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat7Code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">brand_code</label>
            <input type="text" name="brand_code" class="form-control" placeholder="" value="{{ $itemprocess->brand_code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ean</label>
            <input type="text" name="ean" class="form-control" placeholder="" value="{{ $itemprocess->ean }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">access_level</label>
            <input type="text" name="access_level" class="form-control" placeholder="" value="{{ $itemprocess->access_level }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">is_active</label>
            <input type="text" name="is_active" class="form-control" placeholder="" value="{{ $itemprocess->is_active }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="" value="{{ $itemprocess->created_at }}" readonly>
        </div>
    </div>
    <div class="row py-2 px-3">
        <div class="d-grid pr-2">
            <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
