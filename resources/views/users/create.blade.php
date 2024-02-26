<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-12"><h1>Create User</h1></div>


                <div class="clear"></div>
                <form method="POST" action="{{ route('backend.user.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="enter the user name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="enter the user email" value="{{ old('email') }}">
                        @error('email')
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
                        <label for="is_admin" class="form-label">Is Admin</label>
                        <input {{ old('is_admin')?'checked':'' }} type="checkbox" name="is_admin" id="is_admin" value="1">
                    </div>
                    <div class="border-bottom mb-2"></div>

                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="enter the user password" value="{{ old('password') }}">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>

                    <div class="mb-2">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="enter the user confirm password" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="border-bottom mb-2"></div>


                    {{-- <div class="mb-2">
                        <label for="parent_id" class="form-label">Parent user</label>
                        <select name="parent_id" class="form-control" id="parent_id">
                            <option value="" selected>Choose Parent</option>
                            @if ($categories)
                                @foreach ($categories as $user)
                                  <option {{ old('parent_id') == $user->id?'selected':'' }} value="{{ $user->id }}">{{ $user->title }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    <div class="border-bottom mb-2"></div> --}}
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
