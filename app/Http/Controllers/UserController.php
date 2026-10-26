<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Daftar user.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Form tambah user.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Simpan user baru.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());

        try {
            $data['name']     = $request->name;
            $data['email']    = $request->email;
            $data['password'] = Hash::make($request->password);

            User::create($data);
        } catch (\Throwable $e) {
            report($e);

            // withInput() tidak menyertakan password & password_confirmation (lihat $dontFlash)
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data user.');
        }

        return redirect()->route('user.index')->with('success', 'Penambahan Data User Berhasil!');
    }

    /**
     * Form edit user.
     */
    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    /**
     * Update user.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate($this->rules($user->id), $this->messages());

        try {
            $user->name  = $request->name;
            $user->email = $request->email;

            // Password hanya diganti bila diisi
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        } catch (\Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data user.');
        }

        return redirect()->route('user.index')->with('success', 'Perubahan Data User Berhasil!');
    }

    /**
     * Hapus user.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('user.index')->with('error', 'Data user gagal dihapus.');
        }

        return redirect()->route('user.index')->with('success', 'Data User Berhasil Dihapus!');
    }

    /**
     * Aturan validasi. $ignoreId diisi saat update agar email milik user itu sendiri tidak dianggap duplikat.
     * Password: wajib saat create, opsional saat update (kosong = tidak diubah).
     */
    private function rules(?int $ignoreId = null): array
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($ignoreId),
            ],
            'password' => [
                $ignoreId ? 'nullable' : 'required',
                'min:8',
                'confirmed',
            ],
        ];
    }

    private function messages(): array
    {
        return [
            'name.required'      => 'Nama wajib diisi.',
            'name.max'           => 'Nama maksimal 100 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}
