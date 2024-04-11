<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card my-4">
                    <div class="card-header">Update  User Training</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('usersTrain.update', $usersTrain) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row  gx-4 mb-2">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">Users</label>

                                <div class="mb-3 col-md-6">
                                    <select id="user_id" class="form-control border border-2 p-2 @error('user_id') is-invalid @enderror" name="user_id" required>
                                        <option value="">Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" @if ($usersTrain->user_id ==$user->id)
                                                selected
                                            @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="train_id" class="col-md-4 col-form-label text-md-right">train</label>

                                <div class="mb-3 col-md-6">
                                    <select id="train_id" class="form-control border border-2 p-2 @error('train_id') is-invalid @enderror" name="train_id" required>
                                        <option value="">Select train</option>
                                        @foreach($trains as $train)
                                            <option value="{{ $train->id }} "@if ($train->id ==$usersTrain->train_id)
                                                selected
                                            @endif>{{ $train->title }}</option>
                                        @endforeach
                                    </select>

                                    @error('train_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">date</label>

                                <div class="mb-3 col-md-6">
                                    <input id="date" type="date" class="form-control border border-2 p-2 @error('date') is-invalid @enderror" name="date" value="{{ old('date', $usersTrain->date) }}" required>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-md-4 col-form-label text-md-right">time</label>

                                <div class="mb-3 col-md-6">
                                    <input id="time" type="time" class="form-control border border-2 p-2 @error('time') is-invalid @enderror" name="time" value="{{ old('time', $usersTrain->time) }}" required>

                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="duration" class="col-md-4 col-form-label text-md-right">duration</label>

                                <div class="mb-3 col-md-6">
                                    <input id="duration" type="number" class="form-control border border-2 p-2 @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration', $usersTrain->duration) }}" required>

                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="notes" class="col-md-4 col-form-label text-md-right">notes</label>

                                <div class="mb-3 col-md-6">
                                    <textarea id="notes" class="form-control border border-2 p-2 @error('notes') is-invalid @enderror" name="notes" required>{{ old('notes', $usersTrain->notes) }}</textarea>

                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="mb-3 col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
