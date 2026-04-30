  @extends('layouts.backendsettings')
  @section('title', 'Sales Enquiry')
  <style>
    .forgot-form {
      margin-top: 80px;
    }

    .btn-wrap-submit {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      margin-top: 20px;
    }

    .btn-wrap-submit #back-to-login {
      cursor: pointer;
      margin-top: 10px;
    }

    .email-input {
      margin: 0px !important;
    }
  </style>

  @section('content')

  <!-- Login Section -->
  <div class="form-container">
    <div id="ticketForm" class="submit-ticket-form">
      <h2>Submit a ticket</h2>
      <hr />
      <p>
        If you can't find a solution to your problem in our knowledgebase, you
        can submit a ticket by selecting the appropriate department below.
      </p>
      <form>
        <fieldset>
          <legend>Departments</legend>
          <label><input type="radio" name="department" value="sales-support" />
            Sales Support</label><br />
          <label><input type="radio" name="department" value="billing-support" />
            Billing Support</label><br />
          <label><input type="radio" name="department" value="technical-support" />
            Technical Support</label>
        </fieldset>
        <p class="note">
          *Please note that our support team operates 24 x 7, 365 days a week.
        </p>

        <button type="button" class="btn-next" onclick="validateForm(event)">
          Next
        </button>
      </form>
    </div>
  </div>


  @endsection


  <script>
    function validateForm(event) {
      // Prevent form submission or button default action
      event.preventDefault();

      // Check if any radio button is selected
      var selectedDepartment = document.querySelector(
        'input[name="department"]:checked'
      );
      var errorMessage = document.getElementById("error-message"); // Get the error message element

      if (selectedDepartment) {
        // If a department is selected, hide the error message and redirect
        if (errorMessage) {
          errorMessage.style.display = "none"; // Hide the error message
        }
        // Redirect to the next page after a department is selected
        window.location.href = "ticket-details.html"; // You can change this URL to the desired page
      } else {
        // If no department is selected, show the error message
        if (!errorMessage) {
          // Create the error message element if it doesn't already exist
          var error = document.createElement("p");
          error.id = "error-message";
          error.textContent = "*Required";
          error.style.color = "red";
          error.style.fontSize = "1.0em";
          error.style.marginBottom = "10px";

          // Insert the error message above the "Please note" line
          var noteElement = document.querySelector(".note");
          noteElement.parentNode.insertBefore(error, noteElement);
        } else {
          errorMessage.style.display = "block"; // Show the error message if it's hidden
        }
      }
    }

    document.addEventListener("DOMContentLoaded", () => {
      const loginForm = document.querySelector(".login-form"); // login form
      const forgotForm = document.querySelector("#forgot-form"); // forgot form
      const lostPasswordLink = document.querySelector(".lost-password");
      const backToLogin = document.querySelector("#back-to-login");
      const loginHeading = document.querySelector(".login-heading")
      // Show forgot password form
      lostPasswordLink.addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.style.display = "none";
        forgotForm.style.display = "block";
        loginHeading.style.display = 'none';
      });

      // Back to login form
      backToLogin.addEventListener("click", (e) => {
        e.preventDefault();
        forgotForm.style.display = "none";
        loginForm.style.display = "block";
        loginHeading.style.display = 'block';
      });
    });
  </script>
  <script>
    function validateForm(event) {
      event.preventDefault();

      let selected = document.querySelector('input[name="department"]:checked');
      if (!selected) {
        toastr.error("Please select a department before proceeding.");
        return;
      }

      // Store department in localStorage
      localStorage.setItem("selectedDepartment", selected.value);

      // Go to next page
      window.location.href = "ticket-details.html";
    }
  </script>