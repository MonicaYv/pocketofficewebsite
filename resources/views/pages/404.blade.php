@extends('layouts.backendsettings')

@section('title', '404 Not Found | Pocket Office')
@section('meta-title', '404 Not Found | Pocket Office')
@section('meta-description', 'The page you were looking for could not be found. Return to the Pocket Office homepage to continue.')

@section('content')
<!-- 404 page start -->
<div class="error-area text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="error-page-content">
                    <h1 class="display-1">404</h1>
                    <h2>Page Not Found</h2>
                    <p>The page you are looking for does not exist or has been moved. Please check the URL or return home.</p>
                    <div class="error-back-to-home">
                        <a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 page end -->
@endsection