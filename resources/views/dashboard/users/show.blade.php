<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input disabled name="name" type="text" class="form-control border border-2 p-2" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input disabled name="email" type="email" class="form-control border border-2 p-2" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" disabled class="form-control border border-2 p-2">
                                <option value="">Select Gender</option>
                                <option value="male" @if ($user->gender =='male')
                                    selected
                                @endif>Male</option>
                                <option value="female" @if ($user->gender =='female')
                                    selected
                                @endif>Female</option>
                            </select>
                            @error('gender')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Level</label>
                            <input disabled name="level" type="text" class="form-control border border-2 p-2" value="{{ old('level', $user->level) }}">
                            @error('level')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Age</label>
                            <input disabled name="age" type="number" class="form-control border border-2 p-2" value="{{ old('age', $user->age) }}">
                            @error('age')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Weight</label>
                            <input disabled name="weight" type="number" step="0.01" class="form-control border border-2 p-2" value="{{ old('weight', $user->weight) }}">
                            @error('weight')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Height</label>
                            <input disabled name="height" type="number" step="0.01" class="form-control border border-2 p-2" value="{{ old('height', $user->height) }}">
                            @error('height')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-12">
                            <label for="health_status">Health Status</label>
                            <textarea name="health_status" disabled class="form-control border border-2 p-2" rows="4" cols="50">{{ old('health_status', $user->health_status) }}</textarea>
                            @error('health_status')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-6">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control border border-2 p-2" disabled>
                                <option value="">Select Role</option>
                                @foreach(Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                        <div class="mb-3 col-md-12">
                            <img class="avatar" src="{{ asset($user->image) }}" alt="" style="height: 150px;
                            width: 150px;">

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
