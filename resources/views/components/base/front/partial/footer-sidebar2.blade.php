<div class="card w-100">
    <div class="card-body">
      <h5 class="card-title text-center">Shipping</h5>
      <ul class="nav flex-column">
        @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link text-black" href="#">{{ $category->title }}</a>
          </li>
        @endforeach

      </ul>
    </div>
  </div>
