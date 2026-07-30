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
      event.preventDefault();

      let selected = document.querySelector('input[name="department"]:checked');
      if (!selected) {
        toastr.error("Please select a department before proceeding.");
        return;
      }

      // Store department in localStorage
      localStorage.setItem("selectedDepartment", selected.value);

      // Go to next page
      window.location.href = "{{ url('ticket-details') }}";
    }
  </script>
