@extends('layouts.backendsettings')

@section('title', 'Thank You')

@section('content')



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
      <div class="row justify-content-center">

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
              <a href="{{ url('index') }}" class="btn btn-brand btn-block">
                <i class="bi bi-grid-1x2"></i>&nbsp; Go to Home
              </a>
              <a href="{{ route('marketplace.pricing') }}" class="btn btn-default btn-block">
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
@endsection

@push('scripts')
    @vite('resources/js/pricing.js')
@endpush