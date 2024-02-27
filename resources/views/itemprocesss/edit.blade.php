@extends('layouts.app')

@section('title', 'Edit Item Process')

@section('contents')
    <form action="{{ route('itemprocesss.update', $itemprocess->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Code</label>
                <input type="text" name="code" class="form-control" placeholder="" value="{{ $itemprocess->code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="" value="{{ $itemprocess->name }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="uom" class="form-control" placeholder="" value="{{ $itemprocess->uom }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Asset Type</label>
                <input type="text" name="asset_type" class="form-control" placeholder="" value="{{ $itemprocess->asset_type }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">itemCat1Code</label>
                <input type="text" name="itemCat1Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat1Code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">itemCat2Code</label>
                <input type="text" name="itemCat2Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat2Code }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">itemCat3Code</label>
                <input type="text" name="itemCat3Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat3Code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">itemCat4Code</label>
                <input type="text" name="itemCat4Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat4Code }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">itemCat5Code</label>
                <input type="text" name="itemCat5Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat5Code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">itemCat6Code</label>
                <input type="text" name="itemCat6Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat6Code }}" >
            </div>
        </div><div class="row">
            <div class="col mb-3">
                <label class="form-label">itemCat7Code</label>
                <input type="text" name="itemCat7Code" class="form-control" placeholder="" value="{{ $itemprocess->itemCat7Code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">brand_code</label>
                <input type="text" name="brand_code" class="form-control" placeholder="" value="{{ $itemprocess->brand_code }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">ean</label>
                <input type="text" name="ean" class="form-control" placeholder="" value="{{ $itemprocess->ean }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">access_level</label>
                <input type="text" name="access_level" class="form-control" placeholder="" value="{{ $itemprocess->access_level }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">is_active</label>
                <input type="text" name="is_active" class="form-control" placeholder="" value="{{ $itemprocess->is_active }}" >
            </div>
            <div class="col mb-3">
                {{-- <label class="form-label">is_active</label>
                <input type="text" name="is_active" class="form-control" placeholder="0/1" value="{{ $itemprocess->is_active }}" > --}}
            </div>
        </div>
        <div class="row py-2 px-3">
            <div class="d-grid pr-2">
                <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Back</a>
            </div>
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
