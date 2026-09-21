<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New job application</title>
</head>
<body style="font-family: Arial, sans-serif; color: #24324a; line-height: 1.6;">
    <h2 style="color: #057a96;">New job application</h2>
    <p>A new application was submitted through the Pocket Office website.</p>
    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr><th align="left">Applicant</th><td>{{ $application->first_name }}</td></tr>
        <tr><th align="left">Email</th><td><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></td></tr>
        <tr><th align="left">Phone</th><td>{{ $application->phone }}</td></tr>
        <tr><th align="left">Position</th><td>{{ $application->position }}</td></tr>
        @if ($application->job_title)
            <tr><th align="left">Job title</th><td>{{ $application->job_title }}</td></tr>
        @endif
        @if ($application->portfolio)
            <tr><th align="left">Portfolio</th><td><a href="{{ $application->portfolio }}">{{ $application->portfolio }}</a></td></tr>
        @endif
    </table>
    @if ($application->message)
        <h3>Message</h3>
        <p>{!! nl2br(e($application->message)) !!}</p>
    @endif
    <p>The applicant's PDF résumé is attached.</p>
</body>
</html>
