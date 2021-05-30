@csrf
<div class="card-body">
    <div class="form-group">
        <label>Name</label>
        <input
            class="form-control @error('name') is-invalid @enderror"
            type="text"
            name="name"
            value="{{ old('name', $role->name) }}"
            placeholder="Enter name.."
            autofocus>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        @error('permissions')
            <div class="text-danger col-12 mb-2">{{ $message }}</div>
        @enderror

        @foreach ($permissions as $permission)
            <div class="col-3">
                <div class="form-group form-check">
                    <input type="checkbox"
                        class="form-check-input"
                        name="permissions[]"
                        value="{{ $permission->name }}"
                        @isset($rolePermissions)
                            {{ $rolePermissions->contains($permission->name) ? 'checked' : '' }}
                        @endisset
                        @role('super-admin') checked @endrole
                        id="{{ $permission->name }}">
                    <label class="form-check-label" for="{{ $permission->name }}">
                        {{ $permission->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="card-footer d-flex justify-content-end">
    <a href="{{ route('roles.index') }}" class="btn btn-light mr-2"> Cancel </a>
    <button type="submit" class="btn btn-primary" @role('super-admin') disabled @endrole> {{ $buttonText }} </button>
</div>
