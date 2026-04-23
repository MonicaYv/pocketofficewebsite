<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Activation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin:0; padding:0; background:#ffffff; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#f6f6f7"
                    style="margin:20px 0; border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">

                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding:20px;">
                            <img src="https://officelescloud.sizaf.com/public/images/logo.png"
                                alt="Officeles Cloud"
                                width="160"
                                style="display:block; border:0; outline:none;">
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:25px; background:#ffffff; border-radius:6px;">

                            <!-- Greeting (ONLY ONCE) -->
                            <p style="margin:0 0 15px; font-size:15px; color:#333;">
                                Dear {{ $user->name }},
                            </p>

                            <!-- Officeles Cloud Section -->
                            <p style="margin:0 0 10px; font-size:14px; color:#555;">
                                Below are your login credentials for the <strong>Officeles Cloud</strong> platform.
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#f6f6f7; border-radius:6px; padding:15px; margin-bottom:20px;">
                                <tr>
                                    <td style="font-size:14px; color:#333;">
                                        <p style="margin:0 0 8px;">
                                            <strong>Username:</strong> {{ $username }}
                                        </p>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; color:#333;">
                                        <p style="margin:0;">
                                            <strong>Password:</strong> {{ $password }}
                                        </p>
                                    </td>
                                </tr>
                            </table>


                            <p style="margin:0 0 10px; font-size:14px; color:#555;">
                                Your microservices account will be activated within
                                <strong>24 hours</strong>.
                            </p>

                            <p style="margin:0 0 15px; font-size:14px; color:#555;">
                                For security reasons, please change your password after your first login.
                            </p>

                            <p style="margin:0 0 15px; font-size:14px; color:#d00;">
                                <strong>Please note:</strong> The company’s ASP is not responsible for any account-related issues.
                            </p>

                            <p style="margin:0; font-size:14px; color:#555;">
                                Best regards,<br>
                                <!-- <strong>{{ config('app.name') }}</strong> -->
                            </p>

                        </td>
                    </tr>


                    <!-- Button -->
                    <tr>
                        <td align="center" style="padding:20px;">
                            <a href="mailto:support@your-domain.com"
                                style="display:inline-block; background:#f4c430; color:#000;
                      text-decoration:none; padding:10px 22px;
                      border-radius:4px; font-size:14px; font-weight:bold;">
                                Need Help?
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" bgcolor="#dedede" style="padding:15px; border-radius:0 0 6px 6px;">
                            <p style="margin:0; font-size:13px; color:#555; line-height:20px;">
                                Reach out to us at
                                <a href="mailto:officelescloud@ysupport.in" style="color:#0066cc;">
                                    officelescloud@ysupport.in
                                </a>
                                or call
                                <a href="tel:1800222222" style="color:#0066cc;">
                                    1800-02-2222
                                </a>
                                <br>
                                Our team is here to help 24/7.
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- End Container -->

            </td>
        </tr>
    </table>

</body>

</html>