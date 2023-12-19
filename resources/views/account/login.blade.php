<x-layouts.login-base title="Login">
    <x-slot:head>
        <script defer src="{{ asset('js/login.js') }}" type="text/javascript"></script>
    </x-slot:head>


<div class="log-sign-container">
    <h1 class="titel text">Log in</h1>
    <form class="login-form" id="login" method="POST" action="" disabled>
        <div class="label-center">
            <div class="seperator">
        <label>Email:</label> <br />
        <input class="login-input" id="emailField" name="email" type="email"> <br />
        </div>
        <div class="seperator">
        <label>Password:</label> <br />
        <input class="login-input" id="passwordField" name="password" type="password"> <br /><br />
        </div>    
    </div>
        <button id="submitButton" type="submit" class="SigninBtn login-btns">Sign in</button>
    </form>
    <br/>
    <a id="signupBtn" href="{{route('signup')}}"><button class="newAccBtn login-btns" >New Account</button></a>
</div>
</x-layouts.login-base>
