<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome to PocketOffice</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet"/>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background: #f0f4f8;
      font-family: 'Nunito', sans-serif;
      color: #333;
    }
    .email-wrapper {
      max-width: 520px;
      margin: 30px auto;
      background: #ffffff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    }

    .header {
      background: #ffffff;
      padding: 18px 28px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #eef2f6;
    }
    .logo {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 20px;
      font-weight: 800;
      color: #1a1a2e;
    }
    .logo-icon {
      width: 32px;
      height: 25px;
      display: flex;
    }
    .logo-icon svg { width: 20px; height: 20px; fill: white; }
    .social-icons { display: flex; gap: 12px; }
    .social-icons a {
      color: #888;
      text-decoration: none;
      font-size: 16px;
      transition: color 0.2s;
    }
    .social-icons a:hover { color: #17c3b2; }

    .hero {
      background: linear-gradient(160deg, #e8f9f8 0%, #f0f8ff 100%);
      padding: 36px 28px 28px;
      text-align: center;
      position: relative;
    }
    .hero-illustration {
      width: 100%;
      margin: 0 auto 20px;
      display: block;
    }

    /* ── BODY ── */
    .body {
      padding: 28px 32px;
    }
    .greeting {
      font-size: 22px;
      font-weight: 800;
      color: #1a1a2e;
      margin-bottom: 6px;
    }
    .greeting span { color: #17c3b2; }
    .sub-greeting {
      font-size: 14px;
      color: #555;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    /* ── CREDENTIALS CARD ── */
    .credentials {
      background: #f7fafc;
      border-radius: 12px;
      padding: 18px 20px;
      margin-bottom: 18px;
    }
    .credential-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0;
    }
    .credential-row + .credential-row {
      border-top: 1px solid #e8edf2;
    }
    .credential-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .cred-icon {
      width: 36px;
      height: 36px;
      background: #e0f7f5;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .cred-icon svg { width: 18px; height: 18px; }
    .cred-label {
      font-size: 11px;
      color: #999;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .cred-value {
      font-size: 15px;
      font-weight: 700;
      color: #1a1a2e;
      margin-top: 2px;
    }
    .copy-btn {
      background: none;
      border: none;
      cursor: pointer;
      color: #bbb;
      transition: color 0.2s;
      padding: 4px;
    }
    .copy-btn:hover { color: #0694B7; }
    .copy-btn svg { width: 16px; height: 16px; }

    /* ── SECURITY NOTICE ── */
    .security-notice {
      background: #FDF7E9;
      /* border: 1.5px solid #fde68a; */
      border-radius: 10px;
      padding: 12px 16px;
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 24px;
      font-size: 13px;
      color: #92400e;
      font-weight: 600;
      line-height: 1.4;
    }
    .security-notice svg { width: 20px; height: 20px; flex-shrink: 0; fill: #f59e0b; }

    /* ── CTA BUTTON ── */
    .cta-wrapper { text-align: center; margin-bottom: 20px; }
    .cta-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0694B7;
      color: white;
      font-family: 'Nunito', sans-serif;
      font-size: 15px;
      font-weight: 800;
      padding: 14px 36px;
      border-radius: 8px;
      text-decoration: none;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 16px rgba(6, 148, 183, 0.35);
      
    }
    .cta-btn:hover {
      background: #13a89a;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(6, 148, 183, 0.45);
    }
    .cta-btn svg { width: 16px; height: 16px; fill: white; }
    .or-divider {
      text-align: center;
      margin: 14px 0;
      color: #bbb;
      font-size: 13px;
      position: relative;
    }
    .or-divider::before, .or-divider::after {
      content: '';
      position: absolute;
      top: 50%;
      width: 38%;
      height: 1px;
      background: #e8edf2;
    }
    .or-divider::before { left: 0; }
    .or-divider::after { right: 0; }
    .fallback-text {
      text-align: center;
      font-size: 13px;
      color: #777;
      line-height: 1.6;
    }
    .fallback-text a {
      color: #0694B7;
      text-decoration: none;
      font-weight: 700;
    }

    /* ── FOOTER ── */
    .footer {
      background: #f7fafc;
      border-top: 1px solid #eef2f6;
      padding: 22px 28px;
      text-align: center;
    }
    .footer p {
      font-size: 12.5px;
      color: #999;
      margin-bottom: 4px;
    }
    .footer a { color: #0694B7; text-decoration: none; font-weight: 700; }
    .footer-socials {
      display: flex;
      justify-content: center;
      gap: 16px;
      margin-top: 14px;
    }
    .footer-socials a {
      width: 34px;
      height: 34px;
      background: #ffffff;
      border: 1.5px solid #e0e7ef;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #555;
      transition: border-color 0.2s, color 0.2s;
    }
    .footer-socials a:hover { border-color: #17c3b2; color: #17c3b2; }
    .footer-socials svg { width: 15px; height: 15px; }
  </style>
</head>
<body>

<div class="email-wrapper">

  <!-- HEADER -->
  <div class="header">
    <div class="logo">
      <div class="logo-icon">
        <img src="office.svg" alt="office-logo" />
      </div>
    </div>
    <div class="social-icons">
      <!-- Twitter -->
      <a href="#" aria-label="Twitter">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.28 4.28 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04A4.27 4.27 0 0015.5 4c-2.36 0-4.27 1.91-4.27 4.27 0 .33.04.66.1.97C7.73 9.07 4.1 7.18 1.67 4.23a4.26 4.26 0 00-.58 2.15c0 1.48.75 2.79 1.9 3.56a4.23 4.23 0 01-1.94-.54v.05c0 2.07 1.47 3.8 3.42 4.19a4.3 4.3 0 01-1.93.07c.54 1.7 2.12 2.93 3.98 2.97A8.57 8.57 0 012 18.58 12.1 12.1 0 008.29 20c7.55 0 11.68-6.25 11.68-11.67l-.01-.53A8.35 8.35 0 0022.46 6z"/></svg>
      </a>
      <!-- Facebook -->
      <a href="#" aria-label="Facebook">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
      </a>
      <!-- Instagram -->
      <a href="#" aria-label="Instagram">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
      </a>
    </div>
  </div>

  <!-- HERO ILLUSTRATION (inline SVG) -->
  <div class="hero">
    <img class="hero-illustration" src="hero-bg.svg" alt="Hero Image">
    <div style="font-size:22px;font-weight:800;color:#1a1a2e;">
      Welcome to <span style="color:#0694B7;">PocketOffice</span>!
    </div>
  </div>

  <!-- BODY -->
  <div class="body">
    <p class="sub-greeting">
      Hi <strong>{{ $name }}</strong>,<br><br>
      Login Details: 
    </p>

    <!-- Credentials -->
    <div class="credentials">
      <!-- Username -->
      <div class="credential-row">
        <div class="credential-left">
          <div class="cred-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#17c3b2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
          </div>
          <div>
            <div class="cred-label">Username</div>
            <div class="cred-value">{{ $username }}</div>
          </div>
        </div>
        <button class="copy-btn" title="Copy username">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="9" y="9" width="13" height="13" rx="2"/>
            <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/>
          </svg>
        </button>
      </div>

      <!-- Password -->
      <div class="credential-row">
        <div class="credential-left">
          <div class="cred-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#17c3b2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
          </div>
          <div>
            <div class="cred-label">Password</div>
            <div class="cred-value">{{ $password }}</div>
          </div>
        </div>
        <button class="copy-btn" title="Copy password">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="9" y="9" width="13" height="13" rx="2"/>
            <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Security Notice -->
    <div class="security-notice">
      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.25C17.25 22.15 21 17.25 21 12V7L12 2zm0 10h-1V8h2v4h-1zm0 4h-1v-2h2v2h-1z"/>
      </svg>
      For your security, please change your password after your first login.
    </div>

    <!-- CTA Button -->
    <div class="cta-wrapper">
      <a href="https://pocketoffice.sizaf.com" class="cta-btn">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2" fill="white"/>
          <path d="M7 11V7a5 5 0 0110 0v4" stroke="white" stroke-width="2" fill="none"/>
        </svg>
        Login to PocketOffice
      </a>
    </div>

    <div class="or-divider">or</div>

    <p class="fallback-text">
      If the button doesn't work, copy and paste this link in your browser:<br>
      <a href="https://pocketoffice.sizaf.com">https://pocketoffice.sizaf.com</a>
    </p>
  </div>

  <!-- FOOTER -->
  <div class="footer">
    <p>Need help? Contact us at <a href="mailto:support@sizaf.com">support@sizaf.com</a></p>
    <p>© 2024 Sizaf Technologies Pvt. Ltd. All rights reserved.</p>
    <div class="footer-socials">
      <!-- Facebook -->
      <a href="#" aria-label="Facebook">
        <svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
      </a>
      <!-- Twitter -->
      <a href="#" aria-label="Twitter">
        <svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M22.46 6a8.59 8.59 0 01-2.46.69 4.28 4.28 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04A4.27 4.27 0 0015.5 4c-2.36 0-4.27 1.91-4.27 4.27 0 .33.04.66.1.97C7.73 9.07 4.1 7.18 1.67 4.23a4.26 4.26 0 00-.58 2.15c0 1.48.75 2.79 1.9 3.56a4.23 4.23 0 01-1.94-.54v.05c0 2.07 1.47 3.8 3.42 4.19a4.3 4.3 0 01-1.93.07c.54 1.7 2.12 2.93 3.98 2.97A8.57 8.57 0 012 18.58 12.1 12.1 0 008.29 20c7.55 0 11.68-6.25 11.68-11.67l-.01-.53A8.35 8.35 0 0022.46 6z"/></svg>
      </a>
      <!-- LinkedIn -->
      <a href="#" aria-label="LinkedIn">
        <svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
      </a>
      <!-- Instagram -->
      <a href="#" aria-label="Instagram">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
      </a>
    </div>
  </div>

</div>

<script>
  // Copy-to-clipboard for credential buttons
  document.querySelectorAll('.copy-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const val = btn.closest('.credential-row').querySelector('.cred-value').textContent;
      navigator.clipboard.writeText(val).then(() => {
        btn.style.color = '#17c3b2';
        setTimeout(() => btn.style.color = '', 1500);
      });
    });
  });
</script>

</body>
</html>