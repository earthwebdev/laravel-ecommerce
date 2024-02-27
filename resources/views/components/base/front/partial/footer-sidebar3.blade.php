<div class="card w-100">
    <div class="card-body">
      <h5 class="card-title text-center">Useful Link</h5>
      <ul class="nav flex-column">
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Homepage</a>
        </li> --}}
        @foreach ($pages as $page)
        <li class="nav-item">
            <a class="nav-link text-black" href="#">{{ $page->title }}</a>
          </li>
        @endforeach

      </ul>
    </div>
  </div>
