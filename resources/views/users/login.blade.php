<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMDB</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <article>
        <section>
            <h1>Log in</h1>
            <form action="{{route('Welcome')}}">
                @csrf
                <label>Email:</label> <br />
                <input id="email" name="email" type="email"> <br />
                <label>Password:</label> <br />
                <input id="password" name="password" type="password"> <br /><br />
                <button type="submit" class="SigninBtn">Sign in</button>
            </form>
            <br />
            <form action="{{ route('verification')}}">
                @csrf
                <button type="button" class="newAccBtn" >New Account</button>
            </form>
        </section>
    </article>
</body>
</html>