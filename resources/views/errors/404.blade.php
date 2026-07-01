@extends('layouts.backendsettings')

@section('title', '404 - Page Not Found')

@section('content')

<section class="error-page py-5">
    <div class="container text-center">
        <h1 class="display-1 mt-4">404</h1>

        <h2>Oops! Page Not Found</h2>

        <p class="mb-4">
            The page you're looking for doesn't exist or may have been moved.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('/') }}" class="btn btn-primary">
                Go Home
            </a>

            <a href="{{ url('contact-us') }}" class="btn btn-outline-primary">
                Contact Us
            </a>
        </div>

    </div>
</section>

@endsection