@section('styles')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.css" rel="stylesheet">
    <style>
        div.dt-container div.dt-search input {
            border: 1px solid #dee2e6 !important;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js" defer></script>
    <script>
        $(document).ready(function() {
            var table = $("#Table").DataTable({
                searching: true,
                paging: true,
                info: false,
                columnDefs: [{
                    orderable: false,
                    targets: [6]
                }],
            });

                $("#Table tfoot th").each(function(i) {

                    if ($(this).text() !== '') {
                        var isStatusColumn = (($(this).text() == 'Role') ? true : false);
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(this).empty())
                            .on('change', function() {
                                var val = $(this).val();

                                table.column(i)
                                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                                    .draw();
                            });

                        // Get the Status values a specific way since the status is a anchor/image
                        if (isStatusColumn) {
                            var statusItems = [];

                            /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
                            table.column(i).nodes().to$().each(function(d, j) {
                                var thisStatus = $(j).attr("data-filter");
                                if ($.inArray(thisStatus, statusItems) === -1) statusItems.push(
                                    thisStatus);
                            });

                            statusItems.sort();

                            $.each(statusItems, function(i, item) {
                                select.append('<option value="' + item + '">' + item + '</option>');
                            });

                        }
                        // All other non-Status columns (like the example)
                        else {
                            table.column(i).data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                        }

                    }
                });
        });
    </script>
    <script></script>
@endsection
<x-app-layout>
    <div class="">
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="col-6 text-white text-capitalize ps-3">user trains table</h6>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0"
                                        href="{{ route('dashboard.usersTrain.create') }}"><i
                                            class="material-icons text-sm">add</i>
                                        &nbsp;&nbsp;Add
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="Table" class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                User</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Train</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date | Time</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                duration</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                notes</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>user</th>
                                            <th>train</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($userTrains as $index => $userTrain)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $index + 1 }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    {{ $userTrain->user->name }}
                                                </td>
                                                <td>
                                                    {{ $userTrain->train->title }}
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $userTrain->date }} :
                                                                {{ $userTrain->time }}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            {{ $userTrain->duration }}
                                                        </div>

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            {{ $userTrain->notes }}
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('dashboard.usersTrain.edit', $userTrain) }}"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <form
                                                        action="{{ route('dashboard.usersTrain.destroy', $userTrain) }}"
                                                        method="POST" style="  display: unset;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-link">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
