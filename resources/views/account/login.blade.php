<x-layouts.login-base title="Login">
    <x-slot:head>
        <script defer src="{{ asset('js/login.js') }}" type="text/javascript"></script>
    </x-slot:head>



    <h1>Log in</h1>
    <form id="login" method="POST" action="" disabled>
        <label>Email:</label> <br />
        <input id="emailField" name="email" type="email"> <br />
        <label>Password:</label> <br />
        <input id="passwordField" name="password" type="password"> <br /><br />
        <button id="submitButton" type="submit" class="SigninBtn">Sign in</button>
    </form>
    <br/>
    <a id="signupBtn" href="{{route('signup')}}"><button class="newAccBtn" >New Account</button></a>
</x-layouts.login-base>
