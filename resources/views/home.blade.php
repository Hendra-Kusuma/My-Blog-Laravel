@extends('layout/layout')


@section('content')
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="test.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Welcome to my simple blog</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ route('article') }}" class="btn btn-primary btn-lg px-4 me-md-2">See Articles</a>
                    @role('writer')
                        @auth
                            <a href="{{ route('create') }}" type="button" class="btn btn-outline-secondary btn-lg px-4">Make New
                                Articles</a>
                        @endauth
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
