  @extends('layouts.backendsettings')
  @section('title', 'Job Apply')
  @section('content')
  <!-- preloader area start -->
  <!-- <div class="preloader" id="preloader">
    <div class="preloader-inner">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
  </div> -->
  <!-- preloader area end -->

  <!-- search Popup -->
  <div class="body-overlay" id="body-overlay"></div>
  <div class="search-popup" id="search-popup">
    <form onsubmit="searchPage(event)" class="search-form">
      <div class="form-group">
        <input type="text" class="form-control" id="search-input" placeholder="Search....." />
      </div>
      <button type="submit" class="submit-btn">
        <i class="fa fa-search"></i>
      </button>
      <div id="search-results" class="search-results"></div>
    </form>
  </div>
  <!-- //. search Popup -->




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
            <form id="jobApplyForm" class="MapUI-form-wrap" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input type="text" name="firstName" class="single-input" required />
                    <label>First Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input type="email" name="email" class="single-input" required />
                    <label>E-mail</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input type="tel" name="phone" class="single-input" required />
                    <label>Phone</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="single-input-wrap">
                    <input type="text" name="position" class="single-input" required />
                    <label>Applying for the Position of</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="single-input-wrap">
                    <textarea class="single-input" name="portfolio" cols="20"></textarea>
                    <label>Portfolio Link</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="single-input-wrap">
                    <textarea class="single-input" name="message" cols="20"></textarea>
                    <label>Write Your Message</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="custom-file MapUI-file-input-wrap">
                    <input type="file" name="resume" class="MapUI-file-input" id="sb-file-input" required />
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

  <!-- back to top area start -->
  <div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
  </div>
  <!-- back to top area end -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const applyForm = document.getElementById("jobApplyForm");
      if (!applyForm) return;

      applyForm.addEventListener("submit", function(e) {
        e.preventDefault();

        const submitBtn = applyForm.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn ? submitBtn.textContent : "Submit";
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.textContent = "Submitting...";
        }

        let formData = new FormData(applyForm);

        fetch("send_job_application.php", {
            method: "POST",
            body: formData
          })
          .then(res => res.json())
          .then(data => {
            if (data.result === "success") {
              toastr.success(data.msg || "Application submitted successfully!");
              applyForm.reset();

              // Reset custom file input
              const fileInput = document.getElementById('sb-file-input');
              if (fileInput) {
                fileInput.value = ""; // clears the file
                const label = fileInput.nextElementSibling; // your custom label
                if (label && label.classList.contains("custom-file-label")) {
                  label.innerText = "Upload Your Resume"; // reset label text
                }
              }

              // Hide modal if using Bootstrap modal
              const modalEl = document.getElementById('jobApplyModal');
              if (modalEl) {
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
              }
            } else {
              toastr.error(data.msg || "Unable to submit application.");
            }
          })
          .catch(() => toastr.error("Something went wrong. Try again."))
          .finally(() => {
            if (submitBtn) {
              submitBtn.disabled = false;
              submitBtn.textContent = originalBtnText;
            }
          });
      });
    });
  </script>
  @endsection