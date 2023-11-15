<x-layouts.base title="Login">
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <script src="{{ asset('js/crypto.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/input-validator.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('js/signup.js') }}" type="text/javascript"></script>
    </x-slot:head>

    <div class="container-center">
        <article class="Center">
            <section>
                <h1>Log in</h1>
                <form method="GET" action="{{route('Welcome')}}">
                    @csrf
                    <label>Email:</label> <br />
                    <input id="email" name="email" type="email"> <br />
                    <label>Password:</label> <br />
                    <input id="password" name="password" type="password"> <br /><br />
                    <button type="submit" class="SigninBtn">Sign in</button>
                </form>
                <br />
                <form method="GET" action="{{route('signup')}}">
                    @csrf
                    <button type="submit" class="newAccBtn" >New Account</button>
                </form>
            </section>
        </article>
    </div>
</x-layouts.base>
