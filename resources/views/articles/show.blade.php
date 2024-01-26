@extends('layout/layout')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container px-4 py-5" id="featured-3">
        <h1>{{ $blog->title }}</h1>

        <p>{{ $blog->content }}</p>

        <p><i>Author : {{ $blog->author }}</i></p>
    </div>
    @auth
        <div class="container px-4 ">
            <form method="post" onsubmit="return confirm('are you sure want to delete this article')"
                action="/article/{{ $blog->id }}">
                @csrf
                @method('DELETE')
                <a href="/article/{{ $blog->id }}/edit" class="btn btn-primary px-4 py-2 mx-4">Edit Article</a>
                <button class="btn btn-danger px-4 py-2 mx-4">Delete Article</button>
            </form>
        </div>
    @endauth
@endsection
