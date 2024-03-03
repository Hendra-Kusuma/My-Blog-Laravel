@extends('layout/layout')


@section('content')
    <div class="container px-5 py-5 border rounded-3">
        <h1>Verification Email</h1>
        <br>
        @if ($status = session('message'))
            <div class="alert alert-success" role="alert">{{ $status }}</div>
        @endif
        <form action="/email/verification-notification" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Send Verification Email</button>
        </form>
    </div>
@endsection
