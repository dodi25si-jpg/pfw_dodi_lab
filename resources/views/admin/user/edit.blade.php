@extends('layouts.admin.app')

@section('title', 'Edit User')

@section('content')
    @include('layouts.admin.page-header', [
        'title'       => 'Edit User',
        'subtitle'    => 'Form untuk mengedit data user.',
        'breadcrumbs' => ['User' => route('user.index'), 'Edit User' => null],
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
                        'action' => route('user.update', $dataUser->id),
                        'method' => 'PUT',
                        'user'   => $dataUser,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
