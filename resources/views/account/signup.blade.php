<x-layouts.base title="Signup">
    <x-slot:head>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </x-slot:head>

    <div class="container-center">
        <article class="Center">
            <h1>Create new Account</h1>
            <form action="{{route('Welcome')}}">
                @csrf
                <label>Name:</label> <br />
                <input id="first_name" name="first_name" type="text"> <br />
                <label>Email:</label> <br />
                <input id="email" name="email" type="email"> <br />
                <label>Password:</label> <br />
                <input id="password" name="password" type="password"> <br />
                <label>Confirm password:</label> <br />
                <input id="password_repeat" name="password_repeat" type="password"> <br /><br />
                <button type="submit" class="SigninBtn">Create Account</button>
            </form>
        </article>
    </div>
</x-layouts.base>
