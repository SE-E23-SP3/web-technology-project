<x-layouts.base title="Signup">
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <script src="{{ asset('js/crypto.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/input-validator.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/signup.js') }}" type="text/javascript"></script>
    </x-slot:head>

    <div class="container-center">
        <article class="Center">
            <h1>Create new Account</h1>


            <form id="signUp" autocomplete="on">
                @csrf
                <div class="formElement">
                    <div class="">Username<strong class="error-message">*</strong></div>
                    <input class="inputField" id="usernameField" type="text" name="username" autocomplete="name" title="Choose a username"  autofocus required />
                </div>
                <div class="formElement">
                    <div class="">E-mail<strong class="error-message">*</strong></div>
                    <input class="inputField" id="emailField" type="email" name="email" autocomplete="email username" required />
                </div>
                <div class="formElement">
                    <div class="">Password<strong class="error-message">*</strong></div>
                    <input class="inputField" id="passwordField" type="password" name="password" autocomplete="new-password" required />
                </div>
                <div class="formElement">
                    <div class="">Repeat password<strong class="error-message">*</strong></div>
                    <input class="inputField" id="passwordRepeatField" type="password" name="passwordRepeat" autocomplete="new-password" required />
                </div>

                <input type="submit" class="SigninBtn" value="Create new Account"/>
            </form>
        </article>
    </div>
</x-layouts.base>
