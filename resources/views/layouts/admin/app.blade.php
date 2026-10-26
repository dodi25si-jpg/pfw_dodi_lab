<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>@yield('title', 'Dashboard') - PFW Lab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="@yield('title', 'Dashboard') - PFW Lab">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets-admin/assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets-admin/assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets-admin/assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets-admin/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Volt CSS -->
    @include('layouts.admin.css')

</head>

<body>
    {{-- start sidebar --}}
    @include('layouts.admin.sidebar')
    {{-- end sidebar --}}

    <main class="content">
        {{-- start header --}}
        @include('layouts.admin.header')
        {{-- end header --}}

        {{-- start main content --}}
        @yield('content')
        {{-- end main content --}}

        {{-- start footer --}}
        @include('layouts.admin.footer')
        {{-- end footer --}}
    </main>

    {{-- start js --}}
    <!-- Core -->
    @include('layouts.admin.js')
    {{-- end js --}}
</body>

</html>
