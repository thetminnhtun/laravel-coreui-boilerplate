<div class="col-md-12 mt-3">
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> All Roles</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date registered</th>
                        @canany(['edit roles', 'delete roles'])
                            <th>Actions</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at->toFormattedDateString() }}</td>
                            @canany(['edit roles', 'delete roles'])
                                <td>
                                    <div class="d-flex justify-content-start">
                                        @can('edit roles')
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="btn btn-success btn-sm mr-2">
                                                Edit
                                            </a>
                                        @endcan

                                        <!-- Delete Role Modal -->
                                        @can('delete roles')

                                            @if ($role->name == 'super-admin')
                                                <x-modals.confirmation
                                                    name="deleteRoleModal{{ $role->id }}"
                                                    :url="route('roles.destroy', $role->id)">
                                                    <x-slot name="title">
                                                        Delete <strong>{{ $role->name }}
                                                    </x-slot>

                                                    <x-slot name="body">
                                                        Are you sure to delete <strong>{{ $role->name }}</strong>
                                                        permanently?
                                                    </x-slot>
                                                </x-modals.confirmation>
                                            @endif

                                            <button
                                                class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#deleteRoleModal{{ $role->id }}"
                                                @if ($role->name == 'super-admin') disabled @endif>
                                                Delete
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No role.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $roles->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
