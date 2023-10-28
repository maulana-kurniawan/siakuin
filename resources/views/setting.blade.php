<style>
    .nav-tabs>.nav-item>a.active {
        color: #ffffff;
        background-color: #0054a6;
        font-size: medium;
        font-weight: 500;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
                <div class="col-auto">
                    <a href="./" class="btn btn-outline-primary w-100">
                        <i class="ti ti-home me-2"></i><span> Home</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill p-0" data-bs-toggle="tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-profile" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <i class="ti ti-user-circle me-2"></i>
                                        Update Profile</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-password" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <i class="ti ti-key me-2"></i>
                                        Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <div class="d-flex" style="align-items: center;">
                                    <div style="margin-right: 10px;">
                                        <i class="ti ti-check" style="font-size: x-large;"></i>
                                    </div>
                                    <div>
                                        <h4 class="alert-title">Success</h4>
                                        <div class="text-secondary">{{ session('status') }}</div>
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                            @endif
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-profile" role="tabpanel">
                                    <div class="card card-stacked mt-3">
                                        <div class="card-status-start bg-primary"></div>
                                        <div class="card-body">
                                            <h2 class="mb-4">My Account</h2>
                                            <h3 class="card-title">Profile Details</h3>

                                            <form method="POST" action="{{ route('update.profile.image') }}" enctype="multipart/form-data">
                                                @csrf

                                                @if (session('success'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                <div class="row align-items-center">
                                                    <div class="col-2">
                                                        <img class="img-fluid" src="{{'avatars/'.(Auth::user()->profile_image ? Auth::user()->profile_image : 'user.png')}}" />
                                                    </div>
                                                    <div class="col-6">
                                                        <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" required autocomplete="profile_image">
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="submit" class="btn btn-secondary">
                                                            Change avatar
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>

                                            <h3 class="card-title mt-4">Business Profile</h3>

                                            <form action="{{ url('update-user/'.Auth::user()->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="id" value="{{ Auth::user()->id }}" />

                                                <div class="row g-2">
                                                    <div class="col-md">
                                                        <div class="form-label">Business Name</div>
                                                        <input type="text" name="company_name" class="form-control" value="{{ Auth::user()->company_name }}">
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-label">Location</div>
                                                        <input type="text" name="location" class="form-control" value="{{ Auth::user()->location }}">
                                                    </div>
                                                </div>
                                                <h3 class="card-title mt-4">Email</h3>
                                                <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                                                <div class="col-auto">
                                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                                </div>

                                                <div class="card-footer bg-transparent mt-5">
                                                    <div class="btn-list justify-content-end">
                                                        <button type="submit" class="btn btn-primary">
                                                            Change
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-password" role="tabpanel">
                                    <div class="card card-stacked mt-3">
                                        <div class="card-status-start bg-primary"></div>
                                        <div class="card-body">
                                            <h3 class="card-title">Password</h3>
                                            <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login codes.</p>
                                            <div>
                                                <a href="#" class="btn">
                                                    Set new password
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection