<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-6"><h1>Slides</h1></div>
                <div class="col-md-6 text-end"><a class="btn btn-primary text-end" href="{{ route('backend.slide.create') }}">Add Slide</a></div>

                <div class="clear"></div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Title</th>
                        <th class="text-center" scope="col">Image</th>
                        <th class="text-center" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($slides as $slide)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $slide->title }}</td>
                            <td class="text-center">
                                @if ($slide->image)
                                <img width="100" src="{{ asset('storage/images/slides/'.$slide->image ) }}" alt="{{ $slide->title }}" >
                                @endif
                                </td>
                            <td class="text-center">
                                <a class="btn btn-primary d-inline-block" href="{{ route('backend.slide.edit', $slide->id) }}" title="Edit slide">Edit</a>
                                <form class="d-inline-block" action="{{ route('backend.slide.destroy', $slide->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this slide?')" value="Delete">
                                </form>

                            </td>
                          </tr>
                        @empty
                        <tr>
                            <th >2</th>
                            <td scope="row" colspan="4">No data found</td>

                          </tr>
                        @endforelse



                    </tbody>
                  </table>



                  {{ $slides->links() }}
        </div>
    </div>
</x-base.back.layout.app>
