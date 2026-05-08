<!-- Sales enq mail  -->
<p style="margin:0 0 15px; font-size:15px; color:#333;">
    Dear {{ $name }},
</p>

@if($type === 'admin')

    <!-- ADMIN VIEW -->
    <p style="margin:0 0 10px; font-size:14px; color:#555;">
        A new sales enquiry has been received.
    </p>

    <table width="100%" cellpadding="0" cellspacing="0"
        style="background:#f6f6f7; border-radius:6px; padding:15px; margin-bottom:20px;">
        
        <tr><td><strong>Company:</strong> {{ $companyName }}</td></tr>
        <tr><td><strong>Industry:</strong> {{ $industry }}</td></tr>
        <tr><td><strong>Name:</strong> {{ $firstName }} {{ $lastName }}</td></tr>
        <tr><td><strong>Phone:</strong> {{ $phone }}</td></tr>
        <tr><td><strong>Email:</strong> {{ $email }}</td></tr>
        <tr><td><strong>Website:</strong> {{ $website }}</td></tr>
        <tr><td><strong>Address:</strong> {{ $address }}</td></tr>
        <tr><td><strong>Country:</strong> {{ $country }}</td></tr>
        <tr><td><strong>City:</strong> {{ $city }}</td></tr>
    </table>

    <p><strong>Services:</strong></p>
    <ul>
        @foreach($services ?? [] as $service)
            <li>{{ $service }}</li>
        @endforeach
    </ul>

    <p><strong>Message:</strong></p>
    <p>{{ $userMessage }}</p>

@else

    <!-- USER VIEW -->
    <p style="margin:0 0 10px; font-size:14px; color:#555;">
        Thank you for contacting us<strong></strong>.
    </p>

    <p style="margin:0 0 10px; font-size:14px; color:#555;">
        We have received your enquiry and our team will get back to you within 24 hours.
    </p>

    <p style="margin:0; font-size:14px; color:#555;">
        We appreciate your interest in our services.
    </p>

@endif