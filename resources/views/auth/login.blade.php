@extends('layouts.app')

@section('content')
<div class="row g-0 flex-fill loginContent">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
        <div class="container container-tight my-5 px-lg-5">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ ('static/logo.svg') }}" height="36" alt=""></a>
            </div>
            <h2 class="h3 text-center mb-5 textHead"></h2>
            <div class="tabs">
                <ul>
                    <li class="sign_in_li">Sign in</li>
                    <li class="sign_up_li">Sign up</li>
                </ul>
            </div>
            <div class="sign_in">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="emailLogin" class="form-control @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                            <span class="form-label-description">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">I forgot password</a>
                                @endif
                            </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="passwordLogin" class="form-control @error('password') is-invalid @enderror" placeholder="Your password" name="password" required autocomplete="current-password">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary showPassword" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <span class="pwShowicon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-closed" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4"></path>
                                            <path d="M3 15l2.5 -3.8"></path>
                                            <path d="M21 14.976l-2.492 -3.776"></path>
                                            <path d="M9 17l.5 -4"></path>
                                            <path d="M15 17l-.5 -4"></path>
                                        </svg>
                                    </span>
                                </a>
                            </span>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Don't have account yet? <a class="signUp" tabindex="-1">Sign up</a>
                    </div>
                </form>
            </div>

            <div class="sign_up">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your fullname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input id="passwordRegist" type="password" placeholder="Your password" class="form-control @error('passwordRegist') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('passwordRegist')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="input-group-text">
                                <a href="#" class="link-secondary showPassword" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <span class="pwShowicon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-closed" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4"></path>
                                            <path d="M3 15l2.5 -3.8"></path>
                                            <path d="M21 14.976l-2.492 -3.776"></path>
                                            <path d="M9 17l.5 -4"></path>
                                            <path d="M15 17l-.5 -4"></path>
                                        </svg>
                                    </span>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input id="password-confirm" placeholder="Confirm your password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Already have an account? <a class="signIn" tabindex="-1">Sign in</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <!-- Photo -->
        <div class="bg-cover h-100 min-vh-100" style="background-image: url(static/photos/a-visit-to-the-bookstore.jpg)"></div>
    </div>
</div>
@endsection
