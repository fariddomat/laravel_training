<x-app-layout>


    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div> --}}


            <div class="py-4 my-6">
                <div class="card card-body my-4  mt-n6">
                    <div class="row gx-4 mb-2">
                        <form action="{{ route('profile.updateInfo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-lg bg-primary p-2 rounded text-white"
                            >{{ __('Saved.') }}</p>
                        @endif
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control border border-2 p-2" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control border border-2 p-2" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control border border-2 p-2">
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
                                    <input name="level" type="text" class="form-control border border-2 p-2" value="{{ old('level', $user->level) }}">
                                    @error('level')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Age</label>
                                    <input name="age" type="number" class="form-control border border-2 p-2" value="{{ old('age', $user->age) }}">
                                    @error('age')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Weight</label>
                                    <input name="weight" type="number" step="0.01" class="form-control border border-2 p-2" value="{{ old('weight', $user->weight) }}">
                                    @error('weight')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Height</label>
                                    <input name="height" type="number" step="0.01" class="form-control border border-2 p-2" value="{{ old('height', $user->height) }}">
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
                                    <textarea name="health_status" class="form-control border border-2 p-2" rows="4" cols="50">{{ old('health_status', $user->health_status) }}</textarea>
                                    @error('health_status')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn bg-gradient-dark">Save</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
