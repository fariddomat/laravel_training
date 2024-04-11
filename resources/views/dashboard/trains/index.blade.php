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
                                <h6 class="col-6 text-white text-capitalize ps-3">trains table</h6>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('dashboard.trains.create') }}"><i
                                            class="material-icons text-sm">add</i>
                                        &nbsp;&nbsp;Add
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                muscle</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                category</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                title</th>

                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                level</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trains as $index => $train)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $index + 1 }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                        {{ $train->muscle->name }}
                                                        </div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                        {{ $train->category->name }}
                                                        </div>

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $train->title }}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                        {{ $train->level }}
                                                        </div>

                                                    </div>
                                                </td>

                                                <td class="align-middle">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('dashboard.trains.edit', $train) }}" data-original-title=""
                                                        title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <form action="{{ route('dashboard.trains.destroy', $train) }}" method="POST"
                                                        style="  display: unset;">
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
