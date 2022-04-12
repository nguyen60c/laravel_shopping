@extends('layouts.auth-master')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('register.perform') }}" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="divider d-flex align-items-center my-4">
                            <h1 class="text-center fw-bold mx-3 mb-0">Register</h1>
                        </div>
                        @include('layouts.partials.messages')
                        <!-- full name input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="name" class="form-control form-control-lg"
                                placeholder="Enter your full name" value="{{ old('name') }}" required="required"
                                autofocus />
                        </div>

                        <!-- username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" class="form-control form-control-lg"
                                placeholder="Enter username" value="{{ old('username') }}" required="required"
                                autofocus />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" value="{{ old('email') }}" required="required"
                                autofocus />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter password" value="{{ old('password') }}" required="required" />
                        </div>

                        <!-- Confirmation password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                placeholder="Enter confirmation password" value="{{ old('password_confirmation') }}"
                                required="required" />
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        {{-- upload image --}}


                         <div class="form-outline mb-3">
                            <input type="file" name="avatar" class="form-control" />
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a
                                    href="{{ route('login.perform') }}" class="link-danger">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5">
            <!-- Copyright -->
            @include('auth.partials.copy')
            <!-- Copyright -->
        </div>
    </section>
@endsection


