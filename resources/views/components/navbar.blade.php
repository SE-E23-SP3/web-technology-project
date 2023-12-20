<div class="container-fluid p-0 navbar-con">
    <nav class="navbar navbar-expand-lg navbar-colors">
        <a class="navbar-brand a-style a-fix" href="{{route('welcome')}}">
            <img class="logo" src="{{ asset('SMDB-logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-colors" id="navbarSupportedContent">
            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2 searchbar" name="q" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success submit-btn" type="submit">
                    Search
                </button>
            </form>
            <ul class="navbar-nav">
                @foreach ($navbarElements as $key => $url)
                    <li class="navbar-list">
                        <a class="a-fix {{url()->current() == URL::to($url) ? 'active-site' : ''}}" href="{{$url}}">{{$key}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </nav>

</div>