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
                @if(\Session::has('alert'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="d-flex" style="align-items: center;">
                        <div style="margin-right: 10px;">
                            <i class="ti ti-alert-triangle-filled" style="font-size: x-large;"  ></i>
                        </div>
                        <div>
                            <h4 class="alert-title">Error</h4>
                            <div class="text-secondary">{{Session::get('alert')}}</div>
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
                @endif
            
                <form method="POST" action="{{ route('post.login') }}">
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
                    <div class="mb-3">
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

                    <div class="hr-text">or</div>
                    <div>
                        <a href="#" class="btn w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262" id="google">
                                <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
                                <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
                                <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
                                <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
                            </svg>
                            <span>
                                &emsp; Login with Google
                            </span>
                        </a>
                    </div>

                    <div class="text-center text-muted mt-3">
                        Don't have account yet? <a class="signUp" tabindex="-1">Sign up</a>
                    </div>
                </form>
            </div>

            <div class="sign_up">
                <form method="POST" action="{{ route('post.register') }}">
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
                        <div class="input-group input-group-flat">
                            <input id="password-confirm" type="password" placeholder="Confirm your password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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