@extends('layout/layout')


@section('content')
    <div class="container">
        <form action="/article" method="post" enctype="multipart/form-data">
            <h1>Create a New Article</h1>
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                    placeholder="Write your title here" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="write your content"
                    rows="3">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="exampleFormControlInput1"
                    placeholder="Set your Name" value="{{ old('author') }}">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>
    </div>
@endsection
