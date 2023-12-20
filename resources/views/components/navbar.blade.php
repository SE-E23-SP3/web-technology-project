<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<script src="{{ asset('js/navbar.js') }}"></script>
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

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
            <img src="bpp.jpg" alt="Profile Picture" width="40" height="40">
        </button>
    </nav>
</div>

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Select Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex justify-content-around">
                <!-- Icon for Main User -->
                <div class="account-icon" data-account-type="main" onclick="selectAccountType('main')">
                    <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png" alt="Main User Icon" class="img-fluid">
                    <p style="color:black;">Main User</p>
                </div>

                <!-- Icon for Child User -->
                <div class="account-icon" data-account-type="child" onclick="selectAccountType('subaccount2')">
                    <img src="bpp.jpg" alt="Child User Icon" class="img-fluid">
                    <p style="color:black;">Child User</p>
                </div>
            </div>
        </div>
    </div>
</div>
