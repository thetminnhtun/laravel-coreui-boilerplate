<x-admin-layout>
    @section('breadcrumb')
        <div class="c-subheader px-3">
            <!-- Breadcrumb-->
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">User</li>
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
                        placeholder="Search user by name or email">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </span>
                </div>
            </form>
        </div>

        <!-- Create User -->
        <div class="col-md-4 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        </div>
        @include('admin.users._table')
    </div>
</x-admin-layout>
