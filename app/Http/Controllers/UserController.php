<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Memastikan hanya admin yang bisa mengelola pengguna.
     */
    private function authorizeAdmin(): void
    {
        abort_unless(Auth::user()?->role === 'admin', 403);
    }

    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $this->authorizeAdmin();

        $users = User::orderBy('name')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Menampilkan form tambah pengguna.
     */
    public function create()
    {
        $this->authorizeAdmin();

        return view('users.create');
    }

    /**
     * Menyimpan pengguna baru.
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(['admin', 'petugas'])],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit pengguna.
     */
    public function edit(string $id)
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Memperbarui data pengguna.
     */
    public function update(Request $request, string $id)
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(['admin', 'petugas'])],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Menghapus pengguna.
     */
    public function destroy(string $id)
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')
                ->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
