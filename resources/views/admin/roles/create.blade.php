<x-admin-layout>
    @section('breadcrumb')
        <div class="c-subheader px-3">
            <!-- Breadcrumb-->
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Role</a></li>
                <li class="breadcrumb-item active">Create</li>
                <!-- Breadcrumb Menu-->
            </ol>
        </div>
    @endsection

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Role</div>

                <form action="{{ route('roles.store') }}" method="post">
                    @include('admin.roles._form', [
                    'buttonText' => 'Create Role'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
