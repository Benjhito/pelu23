<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/web2py-bootstrap4.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.navigation')
        @if(session("success"))
            <div class="container-fluid mt-3">
                <div class="d-flex alert alert-success shadow-sm justify-content-center" role="alert">
                    <img width="25px" src="{{ asset('images/icons8-informacion.svg') }}" alt="Info">
                    <span class="text-success ml-3 mb-0">{{ session("success") }}</span>
                </div>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="container-fluid mt-3">
                <div class="d-flex alert alert-danger shadow-sm" role="alert">
                    <div class="align-self-center">
                        <img width="25px" src="{{ asset('images/icons8-general-warning-sign-48.png') }}" alt="Warning" class="">
                    </div>
                    <ul class="d-flex flex-column align-self-center list-unstyled ml-4 mb-0">
                        @foreach ($errors->all() as $error)
                            <span class="text-danger"><li>- {{ $error }}</li></span>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <main class="container-fluid main-container">
            @yield('content')
        </main>

        @include('layouts.footer')
        @livewireScripts
    </div>
</body>
</html>
