<x-admin-layout>
    @can('view roles')

        @section('breadcrumb')
            <div class="c-subheader px-3">
                <!-- Breadcrumb-->
                <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Role</li>
                    <!-- Breadcrumb Menu-->
                </ol>
            </div>
        @endsection

        <div class="row justify-content-between">
            <!-- Search -->
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            class="form-control"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search role">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>

            <!-- Create Role -->
            @can('create roles')
                <div class="col-md-4 text-right">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
                </div>
            @endcan

            @include('admin.roles._table')
        </div>
    @endcan
</x-admin-layout>
