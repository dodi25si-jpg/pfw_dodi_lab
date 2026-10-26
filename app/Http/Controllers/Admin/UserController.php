<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Throwable;

class UserController extends Controller
{
    /**
     * Pesan validasi (Bahasa Indonesia), dipakai oleh store() dan update().
     */
    private function messages(): array
    {
        return [
            'name.required'      => 'Nama wajib diisi.',
            'name.max'           => 'Nama maksimal 100 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah digunakan oleh user lain.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama dengan password.',
        ];
    }

    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], $this->messages());

        try {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);

            User::create($data);
        } catch (Throwable $e) {
            report($e);

            return back()->withInput()->with('error', 'Data user gagal disimpan, silakan coba lagi.');
        }

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            // Saat edit, password boleh dikosongkan (berarti password lama dipertahankan)
            'password' => 'nullable|min:8|confirmed',
        ], $this->messages());

        try {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        } catch (Throwable $e) {
            report($e);

            return back()->withInput()->with('error', 'Perubahan data user gagal disimpan, silakan coba lagi.');
        }

        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
        } catch (Throwable $e) {
            report($e);

            return redirect()->route('user.index')->with('error', 'Data user gagal dihapus.');
        }

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
