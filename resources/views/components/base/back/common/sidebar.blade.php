<ul class="nav flex-column">
    {{-- <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Users</a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('backend.category.index') }}">Categories</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.product.index') }}">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled">Orders</a>
    </li>
  </ul>