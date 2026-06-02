<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome to PocketOffice</title>
</head>
<body style="margin:0;padding:0;background:#f0f4f8;font-family:Arial,Helvetica,sans-serif;color:#333;">

  <!-- Outer wrapper -->
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0f4f8;padding:30px 0;">
    <tr>
      <td align="center">

        <!-- Email card -->
        <table width="520" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);max-width:520px;">

          <!-- ── HEADER ── -->
          <tr>
            <td style="background:#ffffff;padding:18px 28px;border-bottom:1px solid #eef2f6;">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td>
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'logo.png') }}" alt="pocketoffice" width="32" height="32" style="display:inline-block;vertical-align:middle;" />
                  </td>
                  <td align="right">
                    <!-- Social Icons -->
                    <a href="#" style="display:inline-block;margin-left:10px;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'twitter-2.png') }}" alt="Twitter" width="20" height="20" style="display:block;" />
                    </a>
                    <a href="#" style="display:inline-block;margin-left:10px;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'facebook-2.png') }}" alt="Facebook" width="20" height="20" style="display:block;" />
                    </a>
                    <a href="#" style="display:inline-block;margin-left:10px;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'instagram-2.png') }}" alt="Instagram" width="20" height="20" style="display:block;" />
                    </a>
                    <a href="#" style="display:inline-block;margin-left:10px;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'linkedin-2.png') }}" alt="LinkedIn" width="20" height="20" style="display:block;" />
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- ── HERO ── -->
          <tr>
            <td style="background:linear-gradient(160deg,#e8f9f8 0%,#f0f8ff 100%);padding:36px 28px 28px;text-align:center;">
              <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-bg.png') }}" alt="Welcome" width="460" style="display:block;margin:0 auto 20px;max-width:100%;height:auto;" />
              <p style="margin:0;font-size:22px;font-weight:800;color:#1a1a2e;font-family:Arial,Helvetica,sans-serif;">
                Welcome to <span style="color:#0694B7;">PocketOffice</span>!
              </p>
            </td>
          </tr>

          <!-- ── BODY ── -->
          <tr>
            <td style="padding:28px 32px;">

              <!-- Greeting -->
              <p style="margin:0 0 20px;font-size:14px;color:#555;line-height:1.6;font-family:Arial,Helvetica,sans-serif;">
                Hi <strong>{{ $name }}</strong>,<br><br>
                Login Details:
              </p>

              <!-- Credentials Card -->
              <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f7fafc;border-radius:12px;margin-bottom:18px;">

                <!-- Username Row -->
                <tr>
                  <td style="padding:14px 20px;border-bottom:1px solid #e8edf2;">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="36" valign="middle">
                          <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td style="width:36px;height:36px;background:#e0f7f5;border-radius:8px;text-align:center;vertical-align:middle;">
                                <!-- User icon (inline SVG as base64 or just use a simple unicode) -->
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'user.svg') }}" width="18" height="18" alt="" style="display:block;margin:9px auto;" />
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td style="padding-left:12px;" valign="middle">
                          <p style="margin:0;font-size:11px;color:#999;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;font-family:Arial,Helvetica,sans-serif;">Username</p>
                          <p style="margin:2px 0 0;font-size:15px;font-weight:700;color:#1a1a2e;font-family:Arial,Helvetica,sans-serif;">{{ $username }}</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <!-- Password Row -->
                <tr>
                  <td style="padding:14px 20px;">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td width="36" valign="middle">
                          <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                              <td style="width:36px;height:36px;background:#e0f7f5;border-radius:8px;text-align:center;vertical-align:middle;">
                                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'lock.svg') }}" width="18" height="18" alt="" style="display:block;margin:9px auto;" />
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td style="padding-left:12px;" valign="middle">
                          <p style="margin:0;font-size:11px;color:#999;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;font-family:Arial,Helvetica,sans-serif;">Password</p>
                          <p style="margin:2px 0 0;font-size:15px;font-weight:700;color:#1a1a2e;font-family:Arial,Helvetica,sans-serif;">{{ $password }}</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

              </table>
              <!-- /Credentials -->

              <!-- Security Notice -->
              <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FDF7E9;border-radius:10px;margin-bottom:24px;">
                <tr>
                  <td style="padding:12px 16px;">
                    <table cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td valign="top" width="26">
                          <img src="{{ asset($constants['IMAGEFILEPATH'] . 'shield-alert.svg') }}" width="20" height="20" alt="" style="display:block;margin-top:1px;" />
                        </td>
                        <td style="padding-left:10px;font-size:13px;color:#92400e;font-weight:600;line-height:1.4;font-family:Arial,Helvetica,sans-serif;">
                          For your security, please change your password after your first login.
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              <!-- CTA Button -->
              <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:20px;">
                <tr>
                  <td align="center">
                    <a href="https://pocketoffice.sizaf.com"
                       style="display:inline-block;background:#0694B7;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:15px;font-weight:800;padding:14px 36px;border-radius:8px;text-decoration:none;box-shadow:0 4px 16px rgba(6,148,183,0.35);">
                      🔐 Login to PocketOffice
                    </a>
                  </td>
                </tr>
              </table>

              <!-- Divider -->
              <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
                <tr>
                  <td style="border-bottom:1px solid #e8edf2;" width="38%">&nbsp;</td>
                  <td align="center" style="font-size:13px;color:#bbb;padding:0 8px;font-family:Arial,Helvetica,sans-serif;">or</td>
                  <td style="border-bottom:1px solid #e8edf2;" width="38%">&nbsp;</td>
                </tr>
              </table>

              <!-- Fallback link -->
              <p style="margin:0;text-align:center;font-size:13px;color:#777;line-height:1.6;font-family:Arial,Helvetica,sans-serif;">
                If the button doesn't work, copy and paste this link in your browser:<br>
                <a href="https://pocketoffice.sizaf.com" style="color:#0694B7;text-decoration:none;font-weight:700;">https://pocketoffice.sizaf.com</a>
              </p>

            </td>
          </tr>

          <!-- ── FOOTER ── -->
          <tr>
            <td style="background:#f7fafc;border-top:1px solid #eef2f6;padding:22px 28px;text-align:center;">
              <p style="margin:0 0 4px;font-size:12px;color:#999;font-family:Arial,Helvetica,sans-serif;">
                Need help? Contact us at <a href="mailto:support@sizaf.com" style="color:#0694B7;text-decoration:none;font-weight:700;">support@sizaf.com</a>
              </p>
              <p style="margin:0 0 14px;font-size:12px;color:#999;font-family:Arial,Helvetica,sans-serif;">
                © 2024 Sizaf Technologies Pvt. Ltd. All rights reserved.
              </p>
              <!-- Footer Socials -->
              <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto;">
                <tr>
                  <td style="padding:0 8px;">
                    <a href="#" style="display:inline-block;width:34px;height:34px;background:#ffffff;border:1.5px solid #e0e7ef;border-radius:50%;text-align:center;line-height:34px;text-decoration:none;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'facebook-2.png') }}" alt="Facebook" width="15" height="15" style="display:block;margin:9px auto;" />
                    </a>
                  </td>
                  <td style="padding:0 8px;">
                    <a href="#" style="display:inline-block;width:34px;height:34px;background:#ffffff;border:1.5px solid #e0e7ef;border-radius:50%;text-align:center;line-height:34px;text-decoration:none;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'twitter-2.png') }}" alt="Twitter" width="15" height="15" style="display:block;margin:9px auto;" />
                    </a>
                  </td>
                  <td style="padding:0 8px;">
                    <a href="#" style="display:inline-block;width:34px;height:34px;background:#ffffff;border:1.5px solid #e0e7ef;border-radius:50%;text-align:center;line-height:34px;text-decoration:none;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'linkedin-2.png') }}" alt="LinkedIn" width="15" height="15" style="display:block;margin:9px auto;" />
                    </a>
                  </td>
                  <td style="padding:0 8px;">
                    <a href="#" style="display:inline-block;width:34px;height:34px;background:#ffffff;border:1.5px solid #e0e7ef;border-radius:50%;text-align:center;line-height:34px;text-decoration:none;">
                      <img src="{{ asset($constants['IMAGEFILEPATH'] . 'instagram-2.png') }}" alt="Instagram" width="15" height="15" style="display:block;margin:9px auto;" />
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        </table>
        <!-- /Email card -->

      </td>
    </tr>
  </table>

</body>
</html>