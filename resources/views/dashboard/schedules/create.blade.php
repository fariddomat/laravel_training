<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('dashboard.schedules.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        @if (auth()->user()->hasRole('coach'))

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control  border border-2 p-2">
                                @foreach (auth()->user()->categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        @else

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control  border border-2 p-2">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        @endif


                        <div class="mb-3 col-md-6">
                            @php
                                $daysOfWeek = [
                                    'Monday',
                                    'Tuesday',
                                    'Wednesday',
                                    'Thursday',
                                    'Friday',
                                    'Saturday',
                                    'Sunday',
                                ];
                            @endphp
                            <label class="form-label">Day</label>
                            <select name="day_of_week" class="form-control  border border-2 p-2">
                                @foreach ($daysOfWeek as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                            @error('day_of_week')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Start time</label>
                            <input name="start_time" type="time" class="form-control border border-2 p-2">
                            @error('start_time')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">End time</label>
                            <input name="end_time" type="time" class="form-control border border-2 p-2">
                            @error('end_time')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>



                        <button type="submit" class="btn bg-gradient-dark">Submit</button>
                </form>

            </div>
        </div>
    </div>

    </div>
</x-app-layout>
