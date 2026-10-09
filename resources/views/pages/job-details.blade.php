@extends('layouts.backendsettings')
@section('title', 'Job Details')
@section('content')

<div class="breadcrumb-area breadcrumb-job-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Pocketoffice Jobs</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="job-details-area pd-top-112">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 offset-xl-1" id="job-detail-container" data-slug="{{ $slug ?? '' }}">
                <div class="section-title">
                    <h2 class="title">Job Details</h2>
                </div>
                
                <h6 class="title" id="jd-title">Loading Position Title...</h6>
                <span id="jd-company">Loading Company...</span>
                
                <h6 class="sub-title">Vacancy</h6>
                <span id="jd-vacancy">-</span>
                
                <h6 class="sub-title">Job Responsibilities</h6>
                <div id="jd-responsibilities" class="mb-4">Loading responsibilities...</div>
                
                <h6 class="sub-title">Educational Requirements</h6>
                <div id="jd-education" class="mb-4">Loading requirements...</div>
                
                <h6 class="sub-title">Experience Requirements</h6>
                <div id="jd-experience" class="mb-4">Loading experience details...</div>
                
                <h6 class="sub-title">Additional Requirements</h6>
                <div id="jd-additional" class="mb-4">Loading additional details...</div>
                
                <h6 class="sub-title">Job Location</h6>
                <p id="jd-location">Loading location...</p>
                
                <h6 class="sub-title">Salary</h6>
                <p id="jd-salary" class="m-0">Loading structure...</p>
                
                <a href="{{ url('job-apply') }}" class="job-apply-btn mt-4">Apply Now</a>
            </div>

            <div class="col-xl-3 col-lg-4 offset-xl-1">
                <div class="widget widget-job-details">
                    <h3 class="widget-title">Job Overview</h3>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Department.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Company</h6>
                            <span id="widget-company">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Location.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Location</h6>
                            <span id="widget-location">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Job-Type.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Job Type</h6>
                            <span id="widget-type">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details">
                        <img src="{{ asset('assets/img/icons/Experience.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Experience</h6>
                            <span id="widget-experience">-</span>
                        </div>
                    </div>
                    
                    <div class="media single-job-details mb-0">
                        <img src="{{ asset('assets/img/icons/Salary.svg') }}" alt="icon" loading="lazy" />
                        <div class="media-body">
                            <h6>Salary</h6>
                            <span id="widget-salary">-</span>
                        </div>
                    </div>

                    <a href="{{ url('job-apply') }}" class="job-apply-btn mt-4">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @vite(['resources/js/job-details.js'])
@endsection
