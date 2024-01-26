@extends('layout/layout')


@section('content')
    <div class="container px-5 py-5">
        <h1>Login</h1>
        <br>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="remember">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
            <br>
            <p class="form label py-3">belum punya akun? register <a href="/register">disini</a></p>
        </form>
    </div>
@endsection
