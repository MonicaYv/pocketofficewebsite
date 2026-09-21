<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Application received</title>
</head>
<body style="font-family: Arial, sans-serif; color: #24324a; line-height: 1.6;">
    <h2 style="color: #057a96;">Thank you for applying</h2>
    <p>Hello {{ $application->first_name }},</p>
    <p>We received your application for <strong>{{ $application->position }}</strong>.</p>
    <p>Our team will review your details and contact you if your experience matches the role.</p>
    <p>Regards,<br>Pocket Office Team</p>
</body>
</html>
