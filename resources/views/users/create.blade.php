@extends('layouts.app')

@section('title', 'Create User')

@section('contents')
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Name" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="number" name="role_id" id="role_id" class="form-control" placeholder="Role Id" value="1" readonly>
            </div>
            <div class="col">
                <select name="role_name" id="role_name" class="form-control">
                    <option value="is_admin">Admin</option>
                    <option value="is_editor" selected>Editor</option>
                    <option value="is_academic">Academic</option>
                    <option value="is_construct">Construct</option>
                    <option value="is_allaccess">All Access</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-grid py-2 px-3">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                };

                if (roleMappings[selectedValue] !== undefined) {
                    roleId = roleMappings[selectedValue];
                }

                $('#role_id').val(roleId);
            });
        });
    </script>
@endsection
