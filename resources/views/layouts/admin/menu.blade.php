{{--
    Daftar menu sidebar (satu-satunya tempat yang perlu diubah saat menambah modul baru).

    Menambah modul baru = tambah SATU baris array di $menus di bawah ini:
      ['label' => 'Produk', 'route' => 'produk.index', 'active' => 'produk.*',
       'icon' => 'solid', 'paths' => ['M...']],
--}}
@php
    $menus = [
        [
            'label'  => 'Dashboard',
            'route'  => 'dashboard.index',
            'active' => 'dashboard.*',
            'icon'   => 'solid',
            'paths'  => [
                'M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z',
                'M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z',
            ],
        ],
        [
            'label'  => 'Pelanggan',
            'route'  => 'pelanggan.index',
            'active' => 'pelanggan.*',
            'icon'   => 'outline',
            'paths'  => [
                'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
            ],
        ],
        [
            'label'   => 'User',
            'route'   => 'user.index',
            'active'  => 'user.*',
            'icon'    => 'solid',
            'evenodd' => true,
            'paths'   => ['M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'],
        ],
    ];
@endphp

@foreach ($menus as $menu)
    @include('layouts.admin.menu-item', $menu)
@endforeach
