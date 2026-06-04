  @extends('layouts.backendsettings')
  @section('title', 'Apply Job')
  @section('content')

<style>
/* Move label when input is focused */
.single-input-wrap .single-input:focus + label {
    top: -10px;
    font-size: 12px;
}

/* Move label when input has value */
.single-input-wrap.active label {
    top: -10px;
    font-size: 12px;
}
</style>
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
              enctype="multipart/form-data">
              <div class="row">
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
  <script>
document.addEventListener("DOMContentLoaded", () => {

    // Floating labels
    const fields = document.querySelectorAll(
        '.single-input-wrap input, .single-input-wrap textarea'
    );

    fields.forEach(field => {

        // Check existing value on page load
        if (field.value.trim() !== '') {
            field.parentElement.classList.add('active');
        }

        // When user types
        field.addEventListener('input', function () {
            if (this.value.trim() !== '') {
                this.parentElement.classList.add('active');
            } else {
                this.parentElement.classList.remove('active');
            }
        });

        // When focus
        field.addEventListener('focus', function () {
            this.parentElement.classList.add('active');
        });

        // When blur
        field.addEventListener('blur', function () {
            if (this.value.trim() === '') {
                this.parentElement.classList.remove('active');
            }
        });
    });

    // Form submit
    const applyForm = document.getElementById("jobApplyForm");
    if (!applyForm) return;

    applyForm.addEventListener("submit", function (e) {
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
            body: formData,
        })
        .then((res) => res.json())
        .then((data) => {
            if (data.result === "success") {

                toastr.success(data.msg || "Application submitted successfully!");

                applyForm.reset();

                // Remove active class after reset
                document.querySelectorAll('.single-input-wrap').forEach(el => {
                    el.classList.remove('active');
                });

                const fileInput = document.getElementById("sb-file-input");

                if (fileInput) {
                    fileInput.value = "";

                    const label = fileInput.nextElementSibling;

                    if (label && label.classList.contains("custom-file-label")) {
                        label.innerText = "Upload Your Resume";
                    }
                }

            } else {
                toastr.error(data.msg || "Unable to submit application.");
            }
        })
        .catch(() => {
            toastr.error("Something went wrong. Try again.");
        })
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

 