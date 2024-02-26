<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-12"><h1>Edit Page</h1></div>


                <div class="clear"></div>
                <form method="POST" action="{{ route('backend.page.update', $page->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="enter the page title" value="{{ old('title')?old('title'):$page->title }}">
                        <input name="id" type="hidden" value="{{ old('id')?old('id'):$page->id }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="slug" class="form-label">Slug</label>
                        <input name="slug" type="slug" class="form-control" id="slug" placeholder="enter the page slug" value="{{ old('slug')?old('slug'):$page->slug }}">
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>

                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <x-base.back.forms.tinymce-editor name="description" id="content" value="{!! old('description')?old('description'):$page->description !!}" />
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Image</label>
                        <input type="file" name="image" id="image">
                        @if ($page->image != null)
                            <img width="200" src="{{ asset('storage/images/pages/'.$page->image) }}" alt="{{ $page->title }}" />
                        @endif
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2 ">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                            <option value="" selected disabled>Choose status</option>
                            <option {{ old('status')== 'active' || $page->status == 'active'?'selected':'' }} value="active">Active</option>
                            <option {{ old('status')=='inactive' || $page->status == 'inactive'?'selected':'' }} value="inactive">InActive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
