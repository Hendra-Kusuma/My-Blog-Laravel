@extends('layout/layout')


@section('content')
    <div class="container">
        <div class="text-center">
            <div class="masthead-followup-icon d-inline-block mb-2 px-4 py-5">
                <img src="Hendra Style.jpg" alt="Hendra's Photo" width="180" height="260">
            </div>
            <div class="container px-4 py-5">
                <h2 class="display-6 fw-normal">Hy, my name is {{ $name }} 😎</h2>
                <p class="col-md-10 col-lg-8 mx-auto lead">
                    i live at {{ $address }}. My gender is {{ $gender }}. Iam Born on date {{ $date_of_birth }}
                    at Jakarta. my profesion is Software Engineer at Zeta Tech Industries.
                </p>
                <div class="container px-2 py-2">
                    <a href="https://github.com/Hendra-Kusuma" target="_blank">
                        <img src="github.png" alt="GitHub Profile" height="60px" width="60px">
                    </a>
                    <a href="https://web.facebook.com/henzo.hoshi/" target="_blank">
                        <img src="facebook.png" alt="Facebook Profile" height="45px" width="45px">
                    </a>
                    <a href="https://www.instagram.com/hendra_abu_humaira_raihan" target="_blank">
                        <img src="instagram.png" alt="Instagram Profile" height="50px" width="50px">
                    </a>
                    <a href="https://wa.me/6285811540061" target="_blank">
                        <img src="whatsap.jpg" alt="Whatsap contact" height="50px" width="50px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
