<h2>Training Portal Login</h2>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('docs.login.submit') }}">

@csrf

<input type="email" name="email" placeholder="Email">

<br><br>

<input type="password" name="password" placeholder="Password">

<br><br>

<button type="submit">Login</button>

</form>