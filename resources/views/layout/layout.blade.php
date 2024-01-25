<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <h1 class="fs-4">Hendra's Blog</h1>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href={{ route('home') }} class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="/article" class="nav-link">Articles</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
            </ul>
        </header>
    </div>

    <div>
        @yield('content')
    </div>

    <div>
        <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
            <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
                <div class="row">
                    <div class="col-lg-3 mb-3">
                        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none"
                            href="/" aria-label="Bootstrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block me-2"
                                viewBox="0 0 118 94" role="img">
                                <title>Bootstrap</title>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                                    fill="currentColor"></path>
                            </svg>
                            <span class="fs-5">Hendra's Blog</span>
                        </a>
                        <ul class="list-unstyled small">
                            <li class="mb-2">Designed and built with all the love in the world for Humaira and Ibun
                            </li>
                            <li class="mb-2">Licensed by © 2024 </li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                        <h5 href='{{ route('home') }}'>Home</h5>
                    </div>
                    <div class="col-6 col-lg-2 mb-3">
                        <h5>Articles</h5>
                    </div>
                    <div class="col-6 col-lg-2 mb-3">
                        <h5>About</h5>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
