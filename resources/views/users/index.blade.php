<x-base.back.layout.app>

    <div class="container">
        <div class="row">

                <div class="col-md-6"><h1>Users</h1></div>
                <div class="col-md-6 text-end"><a class="btn btn-primary text-end" href="{{ route('backend.user.create') }}">Add User</a></div>

                <div class="clear"></div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">email</th>
                        <th class="text-center" scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">
                                {{ $user->email }}
                                </td>
                            <td class="text-center">
                                <a class="btn btn-primary d-inline-block" href="{{ route('backend.user.edit', $user->id) }}" title="Edit user">Edit</a>
                                <form class="d-inline-block" action="{{ route('backend.user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this user?')" value="Delete">
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



                  {{ $users->links() }}
        </div>
    </div>
</x-base.back.layout.app>
