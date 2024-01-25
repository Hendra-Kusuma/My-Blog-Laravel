@extends('layout/layout')


@section('content')
    <div class="container">
        <form action="/article/{{ $blog->id }}" method="post" enctype="multipart/form-data">
            <h1>Edit Article</h1>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Edit Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                    value="{{ $blog->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Edit Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{ $blog->content }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author</label>
                <input type="text" name="author" value="{{ $blog->author }}" class="form-control"
                    id="exampleFormControlInput1">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>
    </div>
@endsection
