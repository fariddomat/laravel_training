<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" class="form-control border border-2 p-2" value="{{ old('name') }}">
                            @error('name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input name="email" type="email" class="form-control border border-2 p-2" value="{{ old('email') }}">
                            @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control border border-2 p-2">
                            @error('password')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input name="password_confirmation" type="password" class="form-control border border-2 p-2">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control border border-2 p-2">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Level</label>
                            <input name="level" type="text" class="form-control border border-2 p-2" value="{{ old('level') }}">
                            @error('level')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Age</label>
                            <input name="age" type="number" class="form-control border border-2 p-2" value="{{ old('age') }}">
                            @error('age')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Weight</label>
                            <input name="weight" type="number" step="0.01" class="form-control border border-2 p-2" value="{{ old('weight') }}">
                            @error('weight')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Height</label>
                            <input name="height" type="number" step="0.01" class="form-control border border-2 p-2" value="{{ old('height') }}">
                            @error('height')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Image</label>
                            <input name="image" type="file" class="form-control border border-2 p-2">
                            @error('image')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="health_status">Health Status</label>
                            <textarea name="health_status" class="form-control border border-2 p-2"
                                      placeholder="Enter health status details" id="health_status" rows="4">{{ old('health_status') }}</textarea>
                            @error('health_status')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control border border-2 p-2">
                                <option value="">Select Role</option>
                                @foreach (Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn bg-gradient-dark">Create User</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
