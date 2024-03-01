@extends('layout/layout')


@section('content')
    <div class="container px-5 py-5 border border rounded-3 mb-5">
        <h1>Forget Password</h1>
        <br>
        @if ($status = session('status'))
            <div class="alert alert-success" role="alert">
                {{ $status }}
            </div>
        @endif
        <form action="/forgot-password" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">Reset Link Password</button>
        </form>
    </div>
@endsection