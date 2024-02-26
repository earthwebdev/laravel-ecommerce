<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-12"><h1>Create Slide</h1></div>


                <div class="clear"></div>
                <form method="POST" action="{{ route('backend.slide.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="enter the slide title" value="{{ old('title') }}">
                        @error('title')
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
                        @error('image')
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
                        <label for="link_title" class="form-label">Link Title</label>
                        <input name="link_title" type="link_title" class="form-control @error('link_title') is-invalid @enderror" id="link_title" placeholder="enter the slide link_title" value="{{ old('link_title') }}">
                        @error('link_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>

                    <div class="mb-2">
                        <label for="btn_link" class="form-label">Slide Link</label>
                        <input name="btn_link" type="btn_link" class="form-control @error('btn_link') is-invalid @enderror" id="btn_link" placeholder="enter the slide btn_link" value="{{ old('btn_link') }}">
                        @error('btn_link')
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
