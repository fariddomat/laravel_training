<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form action="{{ route('trains.medias.store', $train) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-md-6">

                            <label class="form-label">media</label>
                            <input name="media[]" multiple type="file" class="form-control border border-2 p-2">
                            @error('media')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>


                    </div>
                    <button type="submit" class="btn bg-gradient-dark">Submit</button>
                </form>

            </div>
        </div>
    </div>

    </div>
</x-app-layout>
