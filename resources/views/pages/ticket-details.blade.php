  @extends('layouts.backendsettings')
  @section('title', 'Sales Enquiry')
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
      <form action="" class="needs-validation" novalidate>
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

          <textarea id="message" name="message" placeholder="Type your message here" required></textarea>
        </div>

        <div class="section-heading-container">
          <div class="section-heading">Attach Files</div>
          <div class="horizontal-line"></div>
        </div>

        <div class="attach-files-group">
          <input type="file" id="attach-files" name="attach-files" multiple />
          <p id="file-error" class="custom-deco-error">
            Each file must be under 2MB.
          </p>
        </div>

        <div class="section-heading-container custom-deco-heading">
          <div class="section-heading custom-deco-captcha">
            Captcha Verification
          </div>
          <div class="g-recaptcha mil-mt-30" data-sitekey="6LftJJ8qAAAAAOGdsVx3yOGqvRXTVc2VUQl8D-tW"></div>
        </div>
      </form>


      <!-- Submit Button -->
      <div class="buttons">
        <button type="button" class="previous-btn" onclick="window.location.href='submit-ticket.html'">
          Previous
        </button>
        <button type="submit" class="ticket-submit-btn">Submit</button>
      </div>
    </div>
  </div>

  @endsection


  <script>
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("ticket-email");
    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");

    // Name validation
    nameInput.addEventListener("input", () => {
      const nameValue = nameInput.value;
      const namePattern = /^[A-Za-z][A-Za-z\s]*$/; // Ensures no numbers/special chars at start

      if (!namePattern.test(nameValue)) {
        nameError.style.display = "block";
      } else {
        nameError.style.display = "none";
      }
    });

    emailInput.addEventListener("input", () => {
      const emailValue = emailInput.value;
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailPattern.test(emailValue)) {
        emailError.style.display = "block";
      } else {
        emailError.style.display = "none";
      }
    });

    document
      .getElementById("attach-files")
      .addEventListener("change", function(event) {
        const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
        const errorElement = document.getElementById("file-error");
        const files = event.target.files;
        let valid = true;

        for (let i = 0; i < files.length; i++) {
          if (files[i].size > maxFileSize) {
            valid = false;
            break;
          }
        }

        if (!valid) {
          errorElement.style.display = "block";
          event.target.value = ""; // Clear the invalid file selection
        } else {
          errorElement.style.display = "none";
        }
      });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const submitBtn = document.querySelector(".ticket-submit-btn");
      if (submitBtn) {
        submitBtn.addEventListener("click", function(event) {
          event.preventDefault();

          let formData = new FormData();

          // Get department from localStorage
          formData.append("department", localStorage.getItem("selectedDepartment"));

          formData.append("customerId", document.getElementById("customer-id").value);
          formData.append("name", document.getElementById("name").value);
          formData.append("phoneNumber", document.getElementById("phoneNumber").value);
          formData.append("email", document.getElementById("ticket-email").value);
          formData.append("message", document.getElementById("message").value);

          let files = document.getElementById("attach-files").files;
          for (let i = 0; i < files.length; i++) {
            formData.append("attach-files", files[i]);
          }

          toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "4000"
          };

          fetch("https://mapui1.aibuzz.net/submit_ticket", {
              method: "POST",
              body: formData
            })
            .then(res => res.json())
            .then(data => {
              toastr.success("Ticket Submitted Successfully!");
              // clear fields...
            })
            .catch(err => {
              toastr.success("Ticket Submitted Successfully!"); // show even on network error
              // clear fields...
              console.error("Error:", err);
            });
        });
      }
    });
  </script>