@extends('layouts.backendsettings')
@section('title', 'Apply Job')
@section('styles')
    @vite(['resources/css/job-apply.css'])
@endsection
@section('content')

  <!-- Ui element start -->
  <div class="job-listing-page pd-top-190">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
          <div class="section-title text-center">
            <h2 class="title">Apply Now</h2>
            <p>
              Please upload your resume and fill in the fields below to apply
              for your desired position.
            </p>
          </div>
          <div class="job-apply-area">
            <form
              id="jobApplyForm"
              class="MapUI-form-wrap"
              method="POST"
              action="{{ route('job.application.submit') }}"
              data-url="{{ route('job.application.submit') }}"
              enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" name="jobSlug" id="jobSlugField" />
                <input type="hidden" name="jobTitle" id="jobTitleField" />
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input
                      type="text"
                      name="firstName"
                      class="single-input"
                      required />
                    <label>First Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input
                      type="email"
                      name="email"
                      class="single-input"
                      required />
                    <label>E-mail</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input
                      type="tel"
                      name="phone"
                      class="single-input"
                      required />
                    <label>Phone</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input
                      type="text"
                      name="position"
                      class="single-input"
                      required />
                    <label>Applying for the Position of</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="single-input-wrap">
                    <textarea
                      class="single-input"
                      name="portfolio"
                      cols="20"></textarea>
                    <label>Portfolio Link</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="single-input-wrap">
                    <textarea
                      class="single-input"
                      name="message"
                      cols="20"></textarea>
                    <label>Write Your Message</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="custom-file MapUI-file-input-wrap">
                    <input
                      type="file"
                      name="resume"
                      class="MapUI-file-input"
                      id="sb-file-input"
                      accept=".pdf,application/pdf"
                      required />
                    <label class="custom-file-label" for="sb-file-input">Upload Your Resume</label>
                  </div>
                </div>
                
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-blue">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Ui element End -->
@endsection
@section('scripts')
    @vite(['resources/js/job-apply.js'])
@endsection

 
