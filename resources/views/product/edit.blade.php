<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-12"><h1>Edit Category</h1></div>


                <div class="clear"></div>
                <form method="POST" action="{{ route('backend.category.update', $category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="enter the category title" value="{{ old('title')?old('title'):$category->title }}">
                        <input name="id" type="hidden" value="{{ old('id')?old('id'):$category->id }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="slug" class="form-label">Slug</label>
                        <input name="slug" type="slug" class="form-control" id="slug" placeholder="enter the category slug" value="{{ old('slug')?old('slug'):$category->slug }}">
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>

                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <x-base.back.forms.tinymce-editor name="description" id="content" value="{!! old('description')?old('description'):$category->description !!}" />
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Image</label>
                        <input type="file" name="image" id="image">
                        @if ($category->image != null)
                            <img width="200" src="{{ asset('storage/images/categories/'.$category->image) }}" alt="{{ $category->title }}" />
                        @endif
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2 ">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                            <option value="" selected disabled>Choose status</option>
                            <option {{ old('status')== 'active' || $category->status == 'active'?'selected':'' }} value="active">Active</option>
                            <option {{ old('status')=='inactive' || $category->status == 'inactive'?'selected':'' }} value="inactive">InActive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="is_featured" class="form-label">Featured</label>
                        <input {{ old('is_featured') || $category->is_featured ?'checked':'' }} type="checkbox" name="is_featured" id="is_featured" value="1">
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="parent_id" class="form-label">Parent Category</label>
                        <select name="parent_id" class="form-control" id="parent_id">
                            <option value="" selected>Choose Parent</option>
                            @if ($categories)
                                @foreach ($categories as $item)
                                  <option {{ old('parent_id') == $item->id || $category->parent_id == $item->id?'selected':'' }} value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <input class="btn btn-secondary" type="submit" name="submit" value="Update">
                    </div>

                </form>
        </div>
    </div>
@section('footer_scripts')
<x-base.back.common.footer-scripts id="content" />
@endsection
</x-base.back.layout.app>
