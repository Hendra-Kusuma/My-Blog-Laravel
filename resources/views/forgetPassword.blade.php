@extends('layout/layout')


@section('content')
    <div class="container px-5 py-5">
        <h1>Forget Password</h1>
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
            <br>
            <button type="submit" class="btn btn-primary">Send Password</button>
        </form>
    </div>
@endsection