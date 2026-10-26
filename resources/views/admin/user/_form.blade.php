{{--
    Partial form User, dipakai bersama oleh create & edit.
    Variabel:
      $action  : URL tujuan form
      $method  : 'POST' (create) atau 'PUT' (edit)
      $user    : model User (hanya pada edit)
--}}
@php
    $isEdit = isset($user);
@endphp

<form action="{{ $action }}" method="POST" novalidate>
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="row mb-4">
        <div class="col-lg-6 col-sm-12">
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name ?? '') }}" maxlength="100" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email ?? '') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-lg-6 col-sm-12">
            <!-- Password (tidak pernah di-repopulate demi keamanan) -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    autocomplete="new-password" {{ $isEdit ? '' : 'required' }}>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">
                    {{ $isEdit ? 'Kosongkan jika tidak ingin mengubah password. ' : '' }}Minimal 8 karakter.
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control" autocomplete="new-password" {{ $isEdit ? '' : 'required' }}>
            </div>

            <!-- Buttons -->
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
        </div>
    </div>
</form>
