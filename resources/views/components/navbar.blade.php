
<div class="container-fluid p-0">

  <nav class="navbar navbar-expand-lg navbar-colors">
    <a class="" href="#">SMBD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="" href="#">Movies</a>
        </li>
      </ul>

      <form class="d-flex">
        @csrf
        <input class="form-control me-2" 
          type="search" placeholder="Search" 
          aria-label="Search">
        <button class="btn btn-outline-success" type="submit">
          Search
        </button>
      </form>
    </div>
  </nav>

    <!--nav class="navbar navbar-expand-lg navbar-colors" -->

</div>

