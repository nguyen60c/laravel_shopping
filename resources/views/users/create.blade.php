@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new user</h1>
        <div class="lead">
            Add new user and assign role.
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <!-- full name input -->
                <div class="form-outline mb-4">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter your full name"
                        value="{{ old('name') }}" required="required" autofocus />
                </div>

                <!-- username input -->
                <div class="form-outline mb-4">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter username"
                        value="{{ old('username') }}" required="required" autofocus />
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control form-control-lg"
                        placeholder="Enter a valid email address" value="{{ old('email') }}" required="required"
                        autofocus />
                </div>

                <button type="submit" class="btn btn-primary">Save user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
