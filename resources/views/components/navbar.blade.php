<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-colors">
        <a class="navbar-brand a-style" href="{{route('welcome')}}">SMDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-colors" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                @foreach ($navbarElements as $key => $url)
                    <li class="">
                        <a class="{{url()->current() == URL::to($url) ? 'active-site' : ''}}" href="{{$url}}">{{$key}}</a>
                    </li>
                @endforeach
            </ul>
            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    Search
                </button>
            </form>
        </div>

    </nav>

</div>
