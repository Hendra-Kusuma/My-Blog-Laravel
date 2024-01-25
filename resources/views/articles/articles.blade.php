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
                    <h3 class="fs-2 text-body-emphasis">{{ $item->title }}</h3>
                    <p>{{ Str::limit($item->content, 200) }}</p>
                    <a href="/article/{{ $item->id }}" class="icon-link">
                        Read More   
                        <svg class="bi">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="container px-4 py-5" >
            <a href='/article/create' class="btn btn-primary">Make a New Article</a>
        </div>
        {{-- Pagination --}}
        {{ $blogs->links() }}
    </div>
@endsection
