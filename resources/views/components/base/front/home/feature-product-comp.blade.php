@if ($products != null)
<div class="bg-dark text-light py-4">
    <div class="container ">
        <h3 class="text-center h3 pt-2">Featured Products</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)

                <x-base.front.home.product-comp :product='$product' />
            @endforeach
        </div>
    </div>
</div>
@endif
