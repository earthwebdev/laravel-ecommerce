<ul class="nav nav-pills nav-fill flex-column">
    <li class="nav-item">
      <a class="nav-link @if (request()->routeIs('backend.user.*')) active @endif" aria-current="page" href="{{ route('backend.user.index') }}">Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('backend.page.*')) active @endif" aria-current="page" href="{{ route('backend.page.index') }}">Pages</a>
      </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('backend.slide.*')) active @endif" href="{{ route('backend.slide.index') }}">Slides</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if (request()->routeIs('backend.category.*')) active @endif" href="{{ route('backend.category.index') }}">Categories</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('backend.product.*')) active @endif" href="{{ route('backend.product.index') }}">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled">Orders</a>
    </li>
  </ul>
