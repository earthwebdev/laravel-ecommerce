<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 pt-1">
            <span class="mt-2 h1">
                <a class="navbar-brand" href="{{ route('landingPage') }}">
                <i class="bi bi-shop me-1"></i>{{ Config('app.name', 'Ecommerce') }}</a>
            </span>
            </div>
        <div class="col-lg-6 col-md-6">
            <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-column justify-center align-items-center">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pages') }}">Pages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact-us') }}">Contact</a>
                  </li>
              </ul>
            </div>
          </nav></div>
        <div class="col-lg-3 col-md-3 pt-3">
            <div class="d-inline-block text-end float-end">
                <i class="bi bi-search me-4"></i>
                <i class="bi bi-heart me-4"></i>
                <i class="bi bi-cart me-1"></i>
                <div class="countItems d-inline-block ">0</div>
            </div>
        </div>



    </div>
</div>
