@extends('layouts.admin.app')
@section('title', 'Edit Customer')
@section('page-title', 'Edit Customer')
@section('page-subtitle', 'Ubah data customer lalu simpan perubahan.')
@section('content')
<div class="card mb-4 col-md-8">
  <div class="card-body">
    <form action="{{ route('customer.update', $dataCustomer->customer_id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="first_name" class="form-label fw-bold">First Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
            value="{{ old('first_name', $dataCustomer->first_name) }}" placeholder="Nama depan">
          @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="last_name" class="form-label fw-bold">Last Name</label>
          <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
            value="{{ old('last_name', $dataCustomer->last_name) }}" placeholder="Nama belakang">
          @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="birthday" class="form-label fw-bold">Birthday</label>
          <input type="date" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror"
            value="{{ old('birthday', $dataCustomer->birthday ? \Carbon\Carbon::parse($dataCustomer->birthday)->format('Y-m-d') : '') }}">
          @error('birthday')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="gender" class="form-label fw-bold">Gender</label>
          <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
            <option value="">-- Pilih Gender --</option>
            <option value="Male" {{ old('gender', $dataCustomer->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $dataCustomer->gender) == 'Female' ? 'selected' : '' }}>Female</option>
          </select>
          @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fw-bold">Email</label>
        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
          value="{{ old('email', $dataCustomer->email) }}" placeholder="nama@email.com">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label fw-bold">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
          value="{{ old('phone', $dataCustomer->phone) }}" placeholder="08123456789">
        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-info">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>
@endsection
