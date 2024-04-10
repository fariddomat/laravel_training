<x-app-layout>
    <div class="container-fluid py-4 my-6">
        <div class="card card-body my-4 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <form wire:submit.prevent='update'>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email address</label>
                            <input wire:model.lazy="user.email" type="email" class="form-control border border-2 p-2">
                            @error('user.email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Name</label>
                            <input wire:model.lazy="user.name" type="text" class="form-control border border-2 p-2">
                            @error('user.name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Phone</label>
                            <input wire:model.lazy="user.phone" type="number" class="form-control border border-2 p-2">
                            @error('user.phone')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">Location</label>
                            <input wire:model.lazy="user.location" type="text"
                                class="form-control border border-2 p-2">
                            @error('user.location')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">

                            <label for="floatingTextarea2">About</label>
                            <textarea wire:model.lazy="user.about" class="form-control border border-2 p-2"
                                placeholder=" Say something about yourself" id="floatingTextarea2" rows="4" cols="50"></textarea>
                            @error('user.about')
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
