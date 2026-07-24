  @extends('layouts.backendsettings')
  @section('title', 'Sales Enquiry')
  @section('meta-title', 'Sales Enquiry | Pocket Office')
  @section('meta-description', 'Submit a sales enquiry to Pocket Office to learn more about our cloud desktop platform, pricing, and enterprise solutions.')
  @section('meta-keywords', 'sales enquiry, contact sales, pocket office pricing, cloud desktop enquiry')
  @section('meta-image', 'https://pocket-office.ai/assets/img/hero-images/page-title-bg.png')
  @section('canonical', 'https://pocket-office.ai/ticket-details')
  @section('meta-url', 'https://pocket-office.ai/ticket-details')
  @section('structured-data')
  @verbatim
  {
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Sales Enquiry | Pocket Office",
    "url": "https://pocket-office.ai/ticket-details",
    "description": "Submit a sales enquiry to Pocket Office to learn more about our cloud desktop platform, pricing, and enterprise solutions.",
    "inLanguage": "en",
    "image": "https://pocket-office.ai/assets/img/hero-images/page-title-bg.png",
    "publisher": {
      "@type": "Organization",
      "name": "Pocket Office",
      "url": "https://pocket-office.ai/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://pocket-office.ai/assets/img/logo/pocket-office-tm-final-logo.png"
      }
    }
  }
  @endverbatim
  @endsection
  @section('content')


  <!-- Login Section -->
  <div class="form-container">
    <!-- <div class="login-section">
      <h2>LOGIN</h2>
      <form action="your-action-url" method="post" class="needs-validation" novalidate>
        <label for="logEmail">Your email address</label>
        <input type="email" id="logEmail" name="email" class="form-control" required />
        <div class="invalid-feedback">Please enter a valid email address.</div>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required />
        <div class="invalid-feedback">Please enter your password.</div>

        <div class="remember-me">
          <input type="checkbox" id="remember" name="remember" />
          <label for="remember">Remember me</label>
        </div>

        <a href="#" class="lost-password">Lost password</a>

        <button type="submit" class="login-btn">Login</button>
      </form>
    </div> -->

    <div class="ticket-section">
      <h2>Your ticket details</h2>
      <hr />
      <p>
        Submissions with complete data will be given priority. Please make
        sure you comprehensively fill out the fields below.
      </p>

      <!-- General Information Section -->
      <div class="section-heading-container">
        <div class="section-heading">General Information</div>
        <div class="horizontal-line"></div>
      </div>
      <form id="supportRequestForm" class="needs-validation" enctype="multipart/form-data" novalidate>
        <input type="hidden" id="support-department" name="department" />
        <div class="form-item">
          <label for="customerId" class="emailLabel">Customer Id</label>
          <div class="phone-input">
            <input type="text" id="customer-id" name="customerId" placeholder="Enter Customer Id" required />
            <div class="invalid-feedback">Please enter your Customer ID.</div>
          </div>
        </div>

        <div class="enquiry-form-group">
          <label for="name">First and Last Name</label>
          <input type="text" id="name" name="name" placeholder="John wick" required />
          <small id="nameError" class="custom-deco-error">Name must not start with numbers or special
            characters.</small>
        </div>

        <!-- Contact Information Section -->
        <div class="section-heading-container">
          <div class="section-heading">Contact Information</div>
          <div class="horizontal-line"></div>
        </div>

        <div class="form-grid mb-4">
          <!-- Contact Number -->
          <div class="form-item">
            <label for="phoneNumber">Contact Number</label>
            <div class="phone-input">
              <!-- Country Code Dropdown -->
              <select id="countryCodes" name="countryCodes" required>
                <!-- Options will be populated dynamically -->
              </select>

              <!-- Divider Line -->
              <div class="contact-divider"></div>

              <!-- Phone Number Input -->
              <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Contact Number"
                title="Please enter a 10-digit phone number" class="form-control" required />
              <div class="invalid-feedback">Please enter your password.</div>
            </div>
          </div>

          <div class="form-item">
            <label for="customerId" class="emailLabel">Email</label>
            <div class="phone-input">
              <input type="email" id="ticket-email" name="email" placeholder="john@example.com" required />
              <small id="emailError" class="custom-deco-error">Please enter a valid email.</small>
            </div>
          </div>
        </div>

        <!-- Message Section -->
        <div class="section-heading-container">
          <div class="section-heading">Your Message</div>
          <div class="horizontal-line"></div>
        </div>

        <div class="enquiry-form-group">
          <label for="message">Subject</label>

          <textarea id="message" name="message" class="form-control" rows="6" placeholder="Type your message here" required></textarea>
        </div>

        <div class="section-heading-container">
          <div class="section-heading">Attach Files</div>
          <div class="horizontal-line"></div>
        </div>

        <div class="attach-files-group">
          <input type="file" id="attach-files" name="attachments[]" multiple />
          <p id="file-error" class="custom-deco-error" style="display:none;">
            Each file must be under 2MB.
          </p>
        </div>

        <div class="section-heading-container custom-deco-heading">
          <div class="section-heading custom-deco-captcha">
            Captcha Verification
          </div>
          <div class="g-recaptcha mil-mt-30" data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
        </div>
        <div class="buttons">
          <button type="button" class="previous-btn" onclick="window.location.href='{{ url('submit-ticket') }}'">
            Previous
          </button>
          <button type="submit" class="ticket-submit-btn">Submit</button>
        </div>
      </form>
    </div>
  </div>

  @endsection


  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const form = document.getElementById("supportRequestForm");
      const departmentInput = document.getElementById("support-department");
      const fileInput = document.getElementById("attach-files");
      const fileError = document.getElementById("file-error");
      const selectedDepartment = localStorage.getItem("selectedDepartment") || "";

      if (departmentInput) {
        departmentInput.value = selectedDepartment;
      }

      if (!selectedDepartment) {
        toastr.warning("Please choose a department first.");
      }

      fileInput.addEventListener("change", function(event) {
        const maxFileSize = 2 * 1024 * 1024;
        const files = event.target.files;
        let valid = true;

        for (let i = 0; i < files.length; i++) {
          if (files[i].size > maxFileSize) {
            valid = false;
            break;
          }
        }

        if (!valid) {
          fileError.style.display = "block";
          event.target.value = "";
        } else {
          fileError.style.display = "none";
        }
      });

      form.addEventListener("submit", async function(event) {
        event.preventDefault();

        if (!departmentInput.value) {
          toastr.error("Please select a department before submitting.");
          window.location.href = "{{ url('submit-ticket') }}";
          return;
        }

        const submitBtn = form.querySelector(".ticket-submit-btn");
        const originalBtnText = submitBtn ? submitBtn.textContent : "Submit";

        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.textContent = "Submitting...";
        }

        const formData = new FormData(form);

        try {
          const response = await fetch("{{ route('support.request.submit') }}", {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
              "X-Requested-With": "XMLHttpRequest"
            },
            body: formData
          });

          const data = await response.json().catch(() => ({}));

          if (!response.ok || !data.status) {
            throw new Error(data.message || "Unable to submit support request.");
          }

          toastr.success(data.message || "Support request submitted successfully");
          form.reset();
          departmentInput.value = "";
          localStorage.removeItem("selectedDepartment");
          fileError.style.display = "none";
        } catch (error) {
          toastr.error(error.message || "Something went wrong. Try again.");
        } finally {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = originalBtnText;
          }
        }
      });
    });
  </script>
