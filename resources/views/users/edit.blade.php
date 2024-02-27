@extends('layouts.app')

@section('title', 'Edit User')

@section('contents')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" >
            </div>
        </div>
        {{-- <div class="row">
            <div class="col mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $user->password }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Password Confirm</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirm" value="{{ $user->password_confirmation }}" >
            </div>
        </div> --}}
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Role Id</label>
                <input type="number" name="role_id" id="role_id" class="form-control" placeholder="Role Id" value="{{ $user->role_id }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Role Name</label>
                <select name="role_name" id="role_name" class="form-control">
                    <option value="is_admin" {{ $user->role_name === 'is_admin' ? 'selected' : '' }}>Admin</option>
                    <option value="is_editor" {{ $user->role_name === 'is_editor' ? 'selected' : '' }}>Editor</option>
                    <option value="is_academic" {{ $user->role_name === 'is_academic' ? 'selected' : '' }}>Academic</option>
                    <option value="is_construct" {{ $user->role_name === 'is_construct' ? 'selected' : '' }}>Construct</option>
                    <option value="is_allaccess" {{ $user->role_name === 'is_allaccess' ? 'selected' : '' }}>All Access</option>
                    <option value="is_academicDev" {{ $user->role_name === 'is_academicDev' ? 'selected' : '' }}>Academic-Dev</option>
                    <option value="is_constructDev" {{ $user->role_name === 'is_constructDev' ? 'selected' : '' }}>Construct-Dev</option>
                </select>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#role_name').change(function () {
                var selectedValue = $(this).val();
                var roleId = 0; // Default value for "is_admin"

                // Define mappings for Role Ids based on Role Name
                var roleMappings = {
                    'is_admin': 0,
                    'is_editor': 1,
                    'is_academic': 2,
                    'is_construct': 3,
                    'is_allaccess': 4,
                    'is_academicDev': 5,
                    'is_constructDev' : 6
                };

                if (roleMappings[selectedValue] !== undefined) {
                    roleId = roleMappings[selectedValue];
                }

                $('#role_id').val(roleId);
            });
        });
    </script>
@endsection
