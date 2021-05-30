@csrf
<div class="card-body">
    <div class="form-group">
        <label>Name</label>
        <input
            class="form-control @error('name') is-invalid @enderror"
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            placeholder="Enter name.."
            autofocus>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Email</label>
        <input
            class="form-control @error('email') is-invalid @enderror"
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            placeholder="Enter Email..">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Password</label>
        <input
            class="form-control @error('password') is-invalid @enderror"
            type="password"
            name="password"
            placeholder="Enter Password..">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<div class="card-footer d-flex justify-content-end">
    <a href="{{ route('users.index') }}" class="btn btn-light mr-2"> Cancel </a>
    <button type="submit" class="btn btn-primary"> {{ $buttonText }} </button>
</div>
