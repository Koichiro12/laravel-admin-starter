@extends('partials.layouts.auth')
@section('content')
    <div
        class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
        <h1 class="title fw-bold text-white mb-3">Selamat Datang !</h1>
        <p class="subtitle text-white op-7">Silahkan login dengan email dan password yang sudah terdaftar.</p>
    </div>
    <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
        <div class="container container-login container-transparent animated fadeIn">
            <form action="{{route('auth')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <h3 class="text-center">Silahkan Login disini </h3>
                <div class="login-form">
                    <div class="form-group">
                        <label for="email"><b>Email </b></label>
                        <input id="email" name="email" type="email" placeholder="Email" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" name="password" placeholder="password" type="password"
                                class="form-control" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me" name="remember-me">
                            <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-secondary col-md-5 float-end mt-3 mt-sm-0 fw-bold">Sign In</button>
                    </div>
                    {{-- <div class="login-account">
                <span class="msg">Don't have an account yet ?</span>
                <a href="#" id="show-signup" class="link">Sign Up</a>
            </div> --}}
                </div>
            </form>

        </div>

        {{-- <div class="container container-signup container-transparent animated fadeIn">
        <h3 class="text-center">Sign Up</h3>
        <div class="login-form">
            <div class="form-group">
                <label for="fullname"><b>Fullname</b></label>
                <input  id="fullname" name="fullname" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input  id="email" name="email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passwordsignin"><b>Password</b></label>
                <div class="position-relative">
                    <input  id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmpassword"><b>Confirm Password</b></label>
                <div class="position-relative">
                    <input  id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
                    <div class="show-password">
                        <i class="icon-eye"></i>
                    </div>
                </div>
            </div>
            <div class="row form-sub m-0">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="agree" id="agree">
                    <label class="form-check-label" for="agree">I Agree the terms and conditions.</label>
                </div>
            </div>
            <div class="row form-action">
                <div class="col-md-6">
                    <a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-secondary w-100 fw-bold">Sign Up</a>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
