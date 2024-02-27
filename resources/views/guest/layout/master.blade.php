<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Material Item Section</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/images/Letter M.svg') }}" rel="icon">
    <link href="{{ asset('/images/Letter M.svg') }}" rel="apple-touch-icon">

    <!--css -->
    @include('guest.layout.css')

    @stack('style')
</head>

<body>
    <!--nav-->
    @include('guest.layout.nav')

    <!--content-->
    @yield('contents')

    <!--footer-->
    @include('guest.layout.footer')

    <!--backtotop-->
    @include('guest.layout.backtotop')

    <!--js-->
    @include('guest.layout.js')

    <!--notify-->
    {{-- @include('partials.notify')

    @stack('script') --}}

</body>

</html>
