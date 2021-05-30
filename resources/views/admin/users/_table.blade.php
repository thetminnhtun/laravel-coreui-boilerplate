<div class="col-md-12 mt-3">
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> All Users</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-success btn-sm mr-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure to delete {{ $user->name }} permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
