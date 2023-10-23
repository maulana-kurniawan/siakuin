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
                                <a href="{{ route('setting-profile') }}" class="dropdown-item">Settings Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route("logout") }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __("Logout") }}
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

        <main class="py-0">
            @yield("content")
        </main>
    </div>
</body>

</html>