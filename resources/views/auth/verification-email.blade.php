@extends('layout/layout')


@section('content')
    <div class="container px-5 py-5 border rounded-3">
        <h1>Verification Email</h1>
        <br>
        <form action="/register" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Send Verification Email</button>
            <br>
            <p class="form label py-3">sudah punya akun? login <a href="/login">disini</a></p>
        </form>
    </div>
@endsection
