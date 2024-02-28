@if($categories != null)
<div class="container my-4">
    <h3 class="text-center h3">Featured Categories</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($categories as $category)
            <div class="col">
                <div class="card h-100">
                  <img src="{{ asset('storage/images/categories/'.$category->image) }}" class="card-img-top" alt="{{ $category->title }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ $category->title }}</h5>
                    <p class="card-text">{!! $category->description !!}</p>
                  </div>
                </div>
              </div>
            @endforeach


          </div>

</div>
@endif
