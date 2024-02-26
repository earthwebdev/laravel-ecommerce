<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-12"><h1>Create Page</h1></div>


                <div class="clear"></div>
                <form method="POST" action="{{ route('backend.page.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="enter the page title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="slug" class="form-label">Slug</label>
                        <input name="slug" type="slug" class="form-control" id="slug" placeholder="enter the page slug" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>

                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <x-base.back.forms.tinymce-editor name="description" id="content" value="{{ old('description') }}" />
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Image</label>
                        <input type="file" name="image" id="image">
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
                        <input class="btn btn-secondary" type="submit" name="submit" value="Create">
                    </div>

                </form>
        </div>
    </div>
@section('footer_scripts')
<x-base.back.common.footer-scripts id="content" />
@endsection
</x-base.back.layout.app>
