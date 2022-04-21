<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- CSS here -->
    @include('shared.styles')
    @livewireStyles
</head>

<body>
    <!-- preloader start -->
    <livewire:partials.preloader />
    <!-- preloader end -->

    <!-- back to top start -->
    <livewire:partials.back-to-top />
    <!-- back to top end -->

    <!-- header-start -->
    <livewire:partials.app-header />
    <!-- header-end -->

    <!-- offcanvas area start -->
    <livewire:partials.off-canvas />
    <!-- offcanvas area end -->

    <div class="body-overlay"></div>

    <main>
        @yield('content')

        <!-- shop modal start -->
        <livewire:partials.product-preview />
        <!-- shop modal end -->

        <!-- Login modal start -->
        <livewire:partials.login-register-popup />
        <!-- Login modal end -->
    </main>

    <!-- footer-start -->
    <livewire:partials.app-footer />
    <!-- footer-end -->


    @include('shared.scripts')
    @livewireScripts
</body>

</html>
