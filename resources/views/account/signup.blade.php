<x-layouts.login-base title="Signup">
    <x-slot:head>
        <script defer src="{{ asset('js/signup.js') }}" type="text/javascript"></script>
    </x-slot:head>


<div class="log-sign-container">
    <h1 class="titel">Create new Account</h1>

    <form class="sign-up" id="signUp" autocomplete="on" action="/signup/submit" method="post">
        <div class="formElement">
            <div class="label-center div-mar">Username<strong class="error-message">*</strong></div>
            <input class="inputField" id="usernameField" type="text" name="username" autocomplete="name" title="Choose a username"  autofocus required />
        </div>
        <div class="formElement">
            <div class="label-center div-mar">E-mail<strong class="error-message">*</strong></div>
            <input class="inputField" id="emailField" type="email" name="email" autocomplete="email username" required />
        </div>
        <div class="formElement">
            <div class="label-center div-mar">Password<strong class="error-message">*</strong></div>
            <input class="inputField" id="passwordField" type="password" name="password" autocomplete="new-password" required />
        </div>
        <div class="formElement">
            <div class="label-center div-mar">Repeat password<strong class="error-message">*</strong></div>
            <input class="inputField" id="passwordRepeatField" type="password" name="passwordRepeat" autocomplete="new-password" required />
        </div>
        <p>Fields marked with <span class="asteriks">*</span> are required</p>
        <button id="submitButton" type="submit" class="SigninBtn login-btns">Create Account</button>
    </form>
</div>
</x-layouts.login-base>
