<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thank you</title>
  <link rel="icon" type="image/svg+xml" href="assets/img/logo/fav-icon.svg">

  <!-- Bootstrap (same version as your site) -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Thank You page styles -->
  @vite([
  'resources/css/style.css',
  ])
</head>

<body>

  <!-- Confetti canvas — drawn by pricing.js IIFE -->
  <canvas id="confettiCanvas"></canvas>

  <div class="ty-page-wrap">

    <!-- ── Navbar ── -->


    <!-- ── Hero band ── -->
    <div class="ty-hero">
      <div class="ty-hero-check">
        <i class="bi bi-check-lg"></i>
      </div>
      <h1>Thank You!</h1>
      <p>Your subscription has been successfully activated.</p>
    </div>

    <!-- ── Main content ── -->
    <div class="container" style="margin-top:30px; margin-bottom:48px;">
      <div class="row">

        <!-- ════════════════════════════════
         LEFT: Plan + Order Details
    ════════════════════════════════ -->


        <!-- ════════════════════════════════
         RIGHT: Next Steps + Actions
    ════════════════════════════════ -->
        <div class="col-md-6 col-md-offset-3">

          <!-- Next steps -->
          <div class="panel panel-default ty-fade-2">
            <div class="panel-heading">
              <h4><i class="bi bi-list-check"></i>&nbsp; What's Next?</h4>
            </div>
            <div class="panel-body">
              <ul class="ty-steps">
                <li>
                  <div class="ty-step-num">1</div>
                  <div>
                    <strong>Check your email</strong>
                    <span class="text-muted">
                      Setup instructions and login credentials have been sent to your registered address.
                    </span>
                  </div>
                </li>
                <li>
                  <div class="ty-step-num">2</div>
                  <div>
                    <strong>Log in to your workspace</strong>
                    <span class="text-muted">
                      Use the username and password you created to access your dashboard.
                    </span>
                  </div>
                </li>
                <li>
                  <div class="ty-step-num">3</div>
                  <div>
                    <strong>Invite your team</strong>
                    <span class="text-muted">
                      Add members to start collaborating right away.
                    </span>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <!-- Action buttons -->
          <div class="panel panel-default ty-fade-3">
            <div class="panel-body ty-actions">
              <a href="{{ url('home') }}" class="btn btn-brand btn-block">
                <i class="bi bi-grid-1x2"></i>&nbsp; Go to Dashboard
              </a>
              <a href="{{ url('market-place') }}" class="btn btn-default btn-block">
                <i class="bi bi-arrow-left"></i>&nbsp; Back to Pricing
              </a>
            </div>
          </div>

          <p class="ty-footer-note">
            A confirmation email has been sent to your registered address.<br />

          </p>

        </div><!-- /col-md-6 -->

      </div><!-- /row -->
    </div>



  </div><!-- /ty-page-wrap -->

  <!-- jQuery (required by pricing.js) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  @vite([
  'resources/js/pricing.js',
  ])

</body>

</html>