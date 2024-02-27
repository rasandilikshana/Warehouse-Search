@extends('layouts.app')

@section('title', 'Show User')

@section('contents')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Role Id</label>
            <input type="number" name="role_id" class="form-control" placeholder="Role Id" value="{{ $user->role_id }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Role Name</label>
            <input type="text" name="role_name" class="form-control" placeholder="Role Name" value="{{ $user->role_name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $user->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $user->updated_at }}" readonly>
        </div>
    </div>
    <div class="row py-2 px-3">
        <div class="d-grid pr-2">
            <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
