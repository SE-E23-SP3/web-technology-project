<x-layouts.login-base title="Login">
    <x-slot:head>
        <script defer src="{{ asset('js/login.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/login-totp.js') }}" type="text/javascript"></script>
    </x-slot:head>


    <div class="log-sign-container">
        <h1 class="titel text">Log in</h1>
        <form class="login-form" id="login" method="POST" action="" disabled>
            <div class="label-center">
                <div class="seperator formElement">
                    <label>Email:</label> <br />
                    <input class="login-input" id="emailField" name="email" type="email"> <br />
                </div>
                <div class="seperator formElement">
                    <label>Password:</label> <br />
                    <input class="login-input" id="passwordField" name="password" type="password"> <br /><br />
                </div>
            </div>
            <button id="submitButton" type="submit" class="SigninBtn login-btns">Sign in</button>
        </form>
        <div class="login-form hidden" id="totpForm">
            <div class="label-center">
                <div class="seperator formElement">
                    <div class="">Two Factor code<strong class="error-message"></strong></div>
                    <input class="inputField" id="tfaCodeField" maxlength="6" type="text" name="tfa" autocomplete="" required />
                </div>
            </div>
            <button id="submitTotpButton" type="submit" class="SigninBtn login-btns">Sign in</button>
        </div>
        <br/>
        <a id="signupBtn" href="{{route('signup')}}"><button class="newAccBtn login-btns" >New Account</button></a>
    </div>
</x-layouts.login-base>
