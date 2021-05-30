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
                        @canany(['edit users', 'delete users'])
                            <th>Actions</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            @canany(['edit users', 'delete users'])
                                <td>
                                    <div class="d-flex justify-content-start">
                                        @can('edit users')
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-success btn-sm mr-2">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('delete users')
                                            <!-- Delete User Modal -->
                                            <x-modals.confirmation
                                                name="deleteUserModal{{ $user->id }}"
                                                :url="route('users.destroy', $user->id)">
                                                <x-slot name="title">
                                                    Delete <strong>{{ $user->name }}
                                                </x-slot>

                                                <x-slot name="body">
                                                    Are you sure to delete <strong>{{ $user->name }}</strong>
                                                    permanently?
                                                </x-slot>
                                            </x-modals.confirmation>


                                            <button
                                                class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#deleteUserModal{{ $user->id }}">
                                                Delete
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            @endcanany
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
