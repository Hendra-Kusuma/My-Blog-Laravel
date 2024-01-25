@extends('layout/layout')


@section('content')
    <div class="container px-5 py-5">
        <h1>Login</h1>
        <br>
        <form action="/login" method="get">
            @csrf
            <div class="mb-3">
                <label name="email" class="form-label">Email address</label>
                <input type="email" class="form-control">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label name="password" class="form-label">Password</label>
                <input type="text" class="form-control">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection