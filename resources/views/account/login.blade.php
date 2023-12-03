<x-layouts.login-base title="Login">
    <x-slot:head>
    </x-slot:head>



    <h1>Log in</h1>
    <form method="GET" action="{{route('Welcome')}}">
        @csrf
        <label>Email:</label> <br />
        <input id="email" name="email" type="email"> <br />
        <label>Password:</label> <br />
        <input id="password" name="password" type="password"> <br /><br />
        <button type="submit" class="SigninBtn">Sign in</button>
    </form>
    <br/>
    <form method="GET" action="{{route('signup')}}">
        <button type="submit" class="newAccBtn" >New Account</button>
    </form>
</x-layouts.login-base>
