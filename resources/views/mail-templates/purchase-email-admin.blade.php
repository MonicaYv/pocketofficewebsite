<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome to PocketOffice</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet"/>
  <style type="text/css">
    /* Client-specific Styles */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f0f4f8; font-family: 'Nunito', Helvetica, Arial, sans-serif; }

    /* iOS Blue Links Fix */
    a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }

    /* Hover States for capable clients */
    .cta-btn:hover { background-color: #13a89a !important; }
  </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f0f4f8;">

  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; background-color: #f0f4f8;">
    <tr>
      <td align="center" style="padding: 30px 10px;">
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 520px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border-collapse: separate;">
          
          <tr>
            <td style="background-color: #ffffff; padding: 18px 28px; border-bottom: 1px solid #eef2f6;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td align="left" valign="middle">
                    <img src="{{ asset($constants['IMAGEFILEPATH'] . 'office.png') }}" alt="PocketOffice Logo" width="120" style="display: block; font-family: sans-serif; color: #1a1a2e; font-size: 20px; font-weight: 800; border: 0;" />
                  </td>
                  <td align="right" valign="middle">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="padding: 0 4px;">
                          <a href="https://x.com/twitt_login?lang=en" target="_blank" style="text-decoration: none;"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'twitter-2.png') }}" alt="Twitter" width="20" height="20" style="display: block; border: 0;" /></a>
                        </td>
                        <td style="padding: 0 4px;">
                          <a href="https://www.facebook.com/login/" target="_blank" style="text-decoration: none;"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'facebook-2.png') }}" alt="Facebook" width="20" height="20" style="display: block; border: 0;" /></a>
                        </td>
                        <td style="padding: 0 4px;">
                          <a href="https://www.instagram.com/accounts/login/?hl=en" target="_blank" style="text-decoration: none;"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'instagram-2.png') }}" alt="Instagram" width="20" height="20" style="display: block; border: 0;" /></a>
                        </td>
                        <td style="padding: 0 4px;">
                          <a href="https://in.linkedin.com/" target="_blank" style="text-decoration: none;"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'linkdlen-2.png') }}" alt="LinkedIn" width="20" height="20" style="display: block; border: 0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td align="center" style="background: linear-gradient(160deg, #e8f9f8 0%, #f0f8ff 100%); padding: 36px 28px 28px;">
              <img src="{{ asset($constants['IMAGEFILEPATH'] . 'hero-bg.png') }}" alt="Welcome Illustration" width="100%" style="display: block; max-width: 464px; width: 100%; margin-bottom: 20px; border: 0;" />
              <div style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 800; color: #1a1a2e; line-height: 1.2;">
                Welcome to <span style="color: #0694B7;">PocketOffice</span>!
              </div>
            </td>
          </tr>

          <tr>
            <td style="padding: 28px 32px;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                
                <tr>
                  <td style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 14px; color: #555555; line-height: 1.6; padding-bottom: 20px;">
                    Hi <strong>Admin</strong>,<br><br>
                    New Purchase Details:
                  </td>
                </tr>

                <tr>
                  <td style="background-color: #f7fafc; border-radius: 12px; padding: 10px 20px 10px 20px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      
                      <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e8edf2;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">User Type</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $usertype }}</span>
                        </td>
                      </tr>

                      <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e8edf2;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Name</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $name }}</span>
                        </td>
                      </tr>

                      <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e8edf2;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Username</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $username }}</span>
                        </td>
                      </tr>

                      <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e8edf2;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Password</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $password }}</span>
                        </td>
                      </tr>

                      <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e8edf2;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Phone</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $phone }}</span>
                        </td>
                      </tr>

                      <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #e8edf2;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Email</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $email }}</span>
                        </td>
                      </tr>

                      <tr>
                        <td style="padding: 10px 0;">
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 11px; color: #999999; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block;">Designation</span>
                          <span style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 700; color: #1a1a2e; display: block; margin-top: 2px;">{{ $designation }}</span>
                        </td>
                      </tr>

                    </table>
                  </td>
                </tr>

                <tr><td height="24"></td></tr>

                <tr>
                  <td style="background-color: #FDF7E9; border-radius: 10px; padding: 14px 16px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 13px; color: #92400e; font-weight: 600; line-height: 1.45;">
                          ⚠️ <strong>Security Notice:</strong> For your security, please change your password after your first login.
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr><td height="24"></td></tr>

                <tr>
                  <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" style="border-radius: 8px; background-color: #0694B7;">
                          <a href="https://customerlogin.pocket-office.ai" target="_blank" class="cta-btn" style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 800; color: #ffffff; text-decoration: none; padding: 14px 36px; display: inline-block; border-radius: 8px; background-color: #0694B7;">
                            Login to PocketOffice
                          </a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td align="center" style="padding: 20px 0 14px 0;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td style="border-bottom: 1px solid #e8edf2;" width="40%"></td>
                        <td align="center" style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 13px; color: #bbbbbb; padding: 0 10px;" width="20%">or</td>
                        <td style="border-bottom: 1px solid #e8edf2;" width="40%"></td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr>
                  <td align="center" style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 13px; color: #777777; line-height: 1.6; text-align: center;">
                    If the button doesn't work, copy and paste this link into your web browser:<br />
                    <a href="https://customerlogin.pocket-office.ai" target="_blank" style="color: #0694B7; text-decoration: none; font-weight: 700;">https://customerlogin.pocket-office.ai</a>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

          <tr>
            <td style="background-color: #f7fafc; border-top: 1px solid #eef2f6; padding: 24px 28px; text-align: center;">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td style="font-family: 'Nunito', Helvetica, Arial, sans-serif; font-size: 12.5px; color: #999999; line-height: 1.6; padding-bottom: 12px;">
                    Need help? Contact us at <a href="mailto:hello@Pocketoffice.com" style="color: #0694B7; text-decoration: none; font-weight: 700;">hello@Pocketoffice.com</a><br />
                    &copy; 2026 Sizaf Technologies Pvt. Ltd. All rights reserved.
                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="padding: 0 6px;">
                          <a href="https://www.facebook.com/login/" target="_blank"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'facebook-2.png') }}" alt="Facebook" width="28" height="28" style="display: block; border: 0;" /></a>
                        </td>
                        <td style="padding: 0 6px;">
                          <a href="https://x.com/twitt_login?lang=en" target="_blank"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'twitter-2.png') }}" alt="Twitter" width="28" height="28" style="display: block; border: 0;" /></a>
                        </td>
                        <td style="padding: 0 6px;">
                          <a href="https://in.linkedin.com/" target="_blank"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'linkdlen-2.png') }}" alt="LinkedIn" width="28" height="28" style="display: block; border: 0;" /></a>
                        </td>
                        <td style="padding: 0 6px;">
                          <a href="https://www.instagram.com/accounts/login/?hl=en" target="_blank"><img src="{{ asset($constants['IMAGEFILEPATH'] . 'instagram-2.png') }}" alt="Instagram" width="28" height="28" style="display: block; border: 0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        </table></td>
    </tr>
  </table>

</body>
</html>