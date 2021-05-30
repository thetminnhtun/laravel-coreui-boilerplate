<x-admin-layout>
    @section('breadcrumb')
        <div class="c-subheader px-3">
            <!-- Breadcrumb-->
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="/users">User</a></li>
                <li class="breadcrumb-item active">Create</li>
                <!-- Breadcrumb Menu-->
            </ol>
        </div>
    @endsection

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create User</div>

                <form action="{{ route('users.store') }}" method="post">
                    @include('admin.users._form', [
                    'buttonText' => 'Create User'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
