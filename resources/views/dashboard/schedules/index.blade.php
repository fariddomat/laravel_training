<x-app-layout>


    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">Schedules</div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('dashboard.schedules.create') }}"><i
                                        class="material-icons text-sm">add</i>
                                    &nbsp;&nbsp;Add
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="Table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Day of Week</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Trainer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (auth()->user()->hasRole('coach'))
                                    @foreach (auth()->user()->categories as $category)
                                        @foreach ($category->schedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->id }}</td>
                                                <td>{{ $schedule->category->name }}</td>
                                                <td>{{ $schedule->day_of_week }}</td>
                                                <td>{{ $schedule->start_time }}</td>
                                                <td>{{ $schedule->end_time }}</td>
                                                <td>{{ $schedule->category->user->name ?? 'N/A' }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard.schedules.destroy', $schedule) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->id }}</td>
                                            <td>{{ $schedule->category->name }}</td>
                                            <td>{{ $schedule->day_of_week }}</td>
                                            <td>{{ $schedule->start_time }}</td>
                                            <td>{{ $schedule->end_time }}</td>
                                            <td>{{ $schedule->category->user->name ?? 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('dashboard.schedules.destroy', $schedule) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
