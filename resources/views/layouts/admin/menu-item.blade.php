{{--
    Partial satu item menu sidebar.
    Dipanggil oleh layouts.admin.menu (jangan diulang manual di sidebar).

    Variabel:
      $label     : teks menu
      $route     : nama route tujuan, mis. 'user.index'
      $active    : pola route untuk status aktif, mis. 'user.*'
      $icon      : 'solid' (viewBox 20, fill) atau 'outline' (viewBox 24, stroke)
      $paths     : array atribut "d" dari <path> icon
      $evenodd   : (opsional) true bila path memakai fill-rule evenodd
--}}
<li class="nav-item {{ request()->routeIs($active) ? 'active' : '' }}">
    <a href="{{ route($route) }}" class="nav-link">
        <span class="sidebar-icon">
            @if ($icon === 'outline')
                <svg class="icon icon-xs me-2" fill="none" stroke-width="1.5" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    @foreach ($paths as $d)
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $d }}"></path>
                    @endforeach
                </svg>
            @else
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    @foreach ($paths as $d)
                        <path d="{{ $d }}" @if (! empty($evenodd)) fill-rule="evenodd" clip-rule="evenodd" @endif></path>
                    @endforeach
                </svg>
            @endif
        </span>
        <span class="sidebar-text">{{ $label }}</span>
    </a>
</li>
