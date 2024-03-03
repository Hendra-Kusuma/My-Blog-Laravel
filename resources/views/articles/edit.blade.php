@extends('layout/layout')


@section('content')
    <div class="container">
        <form action="/article/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
            <h1>Edit Article</h1>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Edit Title</label>
                <input type="text" name="title" class="form-control" id="title"
                    value="{{ $blog->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="content" class="form-label">Edit Content</label>
                <textarea class="form-control" name="content" id="content" rows="3">{{ $blog->content }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" value="{{ $blog->author }}" class="form-control"
                    id="author">
            </div>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Change Photo Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
