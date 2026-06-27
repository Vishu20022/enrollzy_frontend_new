<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="lang-{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', $site_settings->meta_title ?? config('app.name'))</title>
    <meta name="robots" content="noindex, nofollow">
    @if(!empty($site_settings->meta_description))
        <meta name="description" content="{{ $site_settings->meta_description }}">
    @endif
    @if(!empty($site_settings->meta_keywords))
        <meta name="keywords" content="{{ $site_settings->meta_keywords }}">
    @endif
    @yield('seo')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if($site_settings->favicon ?? false)
        <link rel="icon" type="image/png" href="{{ env('BACKEND_URL') . '/' . $site_settings->favicon }}">
    @endif

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('css/color-font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">


    @stack('css')
</head>

<body>

    @include('includes.header2')
    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}

    @include('includes.footer')


    @include('includes.booking-modal')

    @auth
        @if(empty(auth()->user()->name) || strtolower(trim(auth()->user()->name)) === 'user')
            @include('includes.name-update-modal')
        @endif
    @endauth

    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('js/slider.js')}}"></script>
    <script src="{{asset('js/header.js')}}"></script>
    @stack('js')
</body>

</html>