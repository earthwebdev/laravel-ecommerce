
<div class="col">
    <div class="card h-100">
        @if ($product->image)
        <img src="{{ asset('storage/images/products/'.$product->image) }}" class="card-img-top" alt="{{$product->title }}">
        @endif

      <div class="card-body">

            <h5 class="card-title float-start">{{ $product->title }}</h5>
            <span class="float-end">{{ $product->category->title }}</span>
            <div class="clearfix"></div>
        <p class="card-text">{!! $product->description !!}</p>
      </div>
    </div>
  </div>
