<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');

        $user = User::orderBy('last_seen','DESC')
        ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                ->orwhere('email', 'like', '%' . $search . '%');
            })->get();

        return view('users.index', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return redirect()->route('users')->with('success', 'User added successfully');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users')->with('success', 'user deleted successfully');
    }
}
