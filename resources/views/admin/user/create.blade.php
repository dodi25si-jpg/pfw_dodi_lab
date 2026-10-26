@extends('layouts.admin.app')

@section('title', 'Tambah User')

@section('content')
    @include('layouts.admin.page-header', [
        'title'       => 'Tambah User',
        'subtitle'    => 'Form untuk menambahkan data user baru.',
        'breadcrumbs' => ['User' => route('user.index'), 'Tambah User' => null],
        'actionUrl'   => route('user.index'),
        'actionLabel' => 'Kembali',
    ])

    <div class="row">
        <div class="col-12">
            @include('layouts.admin.alert')
        </div>
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    @include('admin.user._form', [
                        'action' => route('user.store'),
                        'method' => 'POST',
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
