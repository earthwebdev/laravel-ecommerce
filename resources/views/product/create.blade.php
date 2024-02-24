<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-12"><h1>Create Product</h1></div>


                <div class="clear"></div>
                <form method="POST" action="{{ route('backend.product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter the product title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="slug" class="form-label">Slug</label>
                        <input name="slug" type="slug" class="form-control" id="slug" placeholder="Enter the product slug" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" type="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter the product price" value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="discount_percentage" class="form-label">Discount Percentage</label>
                        <input name="discount_percentage" type="discount_percentage" class="form-control @error('discount_percentage') is-invalid @enderror" id="discount_percentage" placeholder="Enter the product discount percentage" value="{{ old('discount_percentage') }}">
                        @error('discount_percentage')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <x-base.back.forms.tinymce-editor name="description" id="content" value="{!! old('description') !!}" />
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Image</label>
                        <input type="file" name="image" id="image">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="" selected>Choose category</option>
                            @if ($categories)
                                @foreach ($categories as $category)
                                  <option {{ old('category_id') == $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            @endif

                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2 ">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                            <option value="" selected disabled>Choose status</option>
                            <option {{ old('status')== 'active'?'selected':'' }} value="active">Active</option>
                            <option {{ old('status')=='inactive'?'selected':'' }} value="inactive">InActive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="is_featured" class="form-label">Featured Product</label>
                        <input {{ old('is_featured')?'checked':'' }} type="checkbox" name="is_featured" id="is_featured" value="1">
                    </div>

                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <input class="btn btn-secondary" type="submit" name="submit" value="Create">
                    </div>

                </form>
        </div>
    </div>
@section('footer_scripts')
<x-base.back.common.footer-scripts id="content" />
@endsection
</x-base.back.layout.app>
