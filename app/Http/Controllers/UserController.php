<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $users = User::when($keyword, function ($q) use ($keyword) {
            $q->where('name', 'like', "%{$keyword}%")
              ->orWhere('email', 'like', "%{$keyword}%");
        })->latest()->paginate(10);

        return view('users.index', compact('users', 'keyword'));
    }

    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', Rule::in(['admin', 'pengurus', 'bendahara', 'anggota'])],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['is_active'] = $request->has('is_active');

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', 'string', Rule::in(['admin', 'pengurus', 'bendahara', 'anggota'])],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['is_active'] = $request->has('is_active');

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($request_user = request()->user()) {
            if ($request_user->id === $user->id) {
                return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
            }
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}