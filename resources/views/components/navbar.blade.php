<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-colors">
        <a class="navbar-brand a-style" href="{{route('welcome')}}">SMDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-colors" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="">
                    <a class="" href="{{route('welcome')}}">Home</a>
                </li>
                <li class="">
                    <a class="" href="">watchlist</a>
                </li>
                <li>
                    <a class="" href="{{route('login')}}">Login</a>
                </li>
                <li>
                    <a class="" href="{{route('signup')}}">Signup</a>
                </li>
            </ul>
            <form class="d-flex">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    Search
                </button>
            </form>
        </div>

    </nav>

</div>
