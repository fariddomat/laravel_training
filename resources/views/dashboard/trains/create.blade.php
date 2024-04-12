<x-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Training Plan</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dashboard.trains.store') }}">
                            @csrf

                            <div class="form-group row  gx-4 mb-2">
                                <label for="muscle_id" class="col-md-4 col-form-label text-md-right">Muscle Group</label>

                                <div class="mb-3 col-md-6">
                                    <select id="muscle_id" class="form-control border border-2 p-2 @error('muscle_id') is-invalid @enderror" name="muscle_id" required>
                                        <option value="">Select Muscle Group</option>
                                        @foreach($muscles as $muscle)
                                            <option value="{{ $muscle->id }}">{{ $muscle->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('muscle_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="mb-3 col-md-6">
                                    <select id="category_id" class="form-control border border-2 p-2 @error('category_id') is-invalid @enderror" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                                <div class="mb-3 col-md-6">
                                    <input id="level" type="text" class="form-control border border-2 p-2 @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" required>

                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="mb-3 col-md-6">
                                    <input id="title" type="text" class="form-control border border-2 p-2 @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="mb-3 col-md-6">
                                    <textarea id="description" class="form-control border border-2 p-2 @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="goal" class="col-md-4 col-form-label text-md-right">Goal</label>

                                <div class="mb-3 col-md-6">
                                    <input id="goal" type="text" class="form-control border border-2 p-2 @error('goal') is-invalid @enderror" name="goal" value="{{ old('goal') }}" required>

                                    @error('goal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="mb-3 col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Training Plan
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
