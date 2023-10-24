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
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-profile" class="nav-link active fs-3" data-bs-toggle="tab" aria-selected="true" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
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
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-profile" role="tabpanel">
                                    <div class="col-12 d-flex flex-column">
                                        <div class="card-body">
                                            <h2 class="mb-4">My Account</h2>
                                            <h3 class="card-title">Profile Details</h3>
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                                </div>
                                                <div class="col-auto"><a href="#" class="btn">
                                                        Change avatar
                                                    </a></div>
                                                <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                                        Delete avatar
                                                    </a></div>
                                            </div>
                                            <h3 class="card-title mt-4">Business Profile</h3>
                                            <div class="row g-2">
                                                <div class="col-md">
                                                    <div class="form-label">Business Name</div>
                                                    <input type="text" class="form-control" value="Tabler">
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-label">Location</div>
                                                    <input type="text" class="form-control" value="Peimei, China">
                                                </div>
                                            </div>
                                            <h3 class="card-title mt-4">Email</h3>
                                            <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                                            <div>
                                                <div class="row g-2">
                                                    <div class="col-auto">
                                                        <input type="text" class="form-control w-auto" value="paweluna@howstuffworks.com">
                                                    </div>
                                                    <div class="col-auto"><a href="#" class="btn">
                                                            Change
                                                        </a></div>
                                                </div>
                                            </div>

                                            <div class="card-footer bg-transparent mt-5">
                                                <div class="btn-list justify-content-end">
                                                    <a href="#" class="btn">
                                                        Cancel
                                                    </a>
                                                    <a href="#" class="btn btn-primary">
                                                        Submit
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-password" role="tabpanel">
                                    <div class="col-12 d-flex flex-column">
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