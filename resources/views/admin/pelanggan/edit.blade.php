
@extends('layouts.admin.app')

@section('title', 'Edit Pelanggan')

@section('content')
        @include('layouts.admin.page-header', [
            'title'       => 'Edit Pelanggan',
            'subtitle'    => 'Form untuk mengedit data pelanggan.',
            'breadcrumbs' => ['Pelanggan' => route('pelanggan.index'), 'Edit Pelanggan' => null],
            'actionUrl'   => route('pelanggan.index'),
            'actionLabel' => 'Kembali',
        ])

        <div class="row">
            <div class="col-12">
                @include('layouts.admin.alert')
            </div>
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <form action="{{route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-4">
                                <div class="col-lg-4 col-sm-6">
                                    <!-- First Name -->
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First name</label>
                                        <input type="text" id="first_name" class="form-control" name="first_name" value="{{ $dataPelanggan->first_name }}"required>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last name</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $dataPelanggan->last_name }}"required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6">
                                    <!-- Birthday -->
                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" id="birthday" class="form-control" name="birthday" value="{{ $dataPelanggan->birthday }}"required>
                                    </div>

                                    <!-- Gender -->
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select id="gender" name="gender" class="form-select">
                                            <option value="">-- Pilih --</option>
                                           <option value="Male" {{$dataPelanggan->gender == 'Male' ?  'selected' :''}}>Male</option>
                                            <option value="Female" {{$dataPelanggan->gender == 'Female' ?  'selected' :''}}>Female</option>
                                            <option value="Other" {{$dataPelanggan->gender == 'Other' ?  'selected' :''}}>Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" class="form-control" name="email" value="{{ $dataPelanggan->email }}"required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" id="phone" class="form-control" name="phone" value="{{ $dataPelanggan->phone }}"required>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endsection

