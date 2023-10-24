<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config("app.name", "Laravel") }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://api.fontshare.com/v2/css?f[]=supreme@501,800,400,401,200,100,300,101,301,500,201,801,701,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    @vite(["resources/css/login.css", "resources/js/app.js"])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url("/") }}">
                    {{ config("app.name", "Laravel") }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __("Toggle navigation") }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has("login"))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route("login") }}">{{ __("Login") }}</a>
                            </li> -->
                        @endif

                        @if (Route::has("register"))
                        <!-- <li class="nav-item">
                             <a class="nav-link" href="{{ route("register") }}">{{ __("Register") }}</a>
                             </li> -->
                        @endif
                        @else
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu" aria-expanded="false">
                                <span class="avatar avatar-sm" style="background-image: url(./static/logo-small.svg)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="mt-1 small text-secondary">{{ Auth::user()->email }}</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                <a href="{{ route('setting-profile') }}" class="dropdown-item">
                                    <span class="me-2"><i class="ti ti-mood-cog"></i></span> Settings Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route("logout") }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="me-2"><i class="ti ti-logout"></i></span>  {{ __("Logout") }}
                                </a>
                                <form id="logout-form" action="{{ route("logout") }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            @yield("content")
        </main>
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                            <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                            <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                            <li class="list-inline-item">
                                <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                    </svg>
                                    Sponsor
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright © 2023
                                <a href="." class="link-secondary">Tabler</a>.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="link-secondary" rel="noopener">
                                    v1.0.0
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>