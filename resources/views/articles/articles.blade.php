@extends('layout/layout')


@section('content')
    <div class="container px-4 py-5" id="featured-3">
        <form action="/article" method="get">
            <input type="text" name="search" placeholder="search article" class="form-control">
        </form>
        <br>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
            @foreach ($blogs as $item)
                <div class="feature col">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="" class="img-fluid mx-auto d-block" style="max-width: auto; max-height: 360px; border-radius: 10px">
                    <h3 class="fs-2 text-body-emphasis">{{ $item->title }}</h3>
                    <p style="text-align: justify;">{{ Str::limit($item->content, 200) }}</p>
                    <a href="/article/{{ $item->id }}" class="icon-link">
                        Read More
                        <svg class="bi">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
        @role('writer')
            @auth
                <div class="container px-4 py-5">
                    <a href='/article/create' class="btn btn-primary">Make a New Article</a>
                </div>
            @endauth
        @endrole
        {{-- Pagination --}}
        {{ $blogs->links() }}
    </div>
@endsection
