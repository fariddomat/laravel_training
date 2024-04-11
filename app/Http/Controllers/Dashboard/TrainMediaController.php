<?php
// app/Http/Controllers/Dashboard/TrainMediaController.php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Train;
use App\Models\TrainMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function index(Train $train)
    {
        $medias = $train->media;
        return view('dashboard.trains.media.index', compact('train', 'medias'));
    }

    public function create(Train $train)
    {
        return view('dashboard.trains.media.create', compact('train'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Train $train)
    {
        $validator = Validator::make($request->all(), [
            'media' => 'required',
            'media.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle media uploads (loop through each media file)
        foreach ($request->file('media') as $mediaFile) {
            // ... (upload logic, store path in $mediaPath)

            TrainMedia::create([
                'train_id' => $train->id,
                'media_path' => '$mediaPath',
            ]);
        }

        return redirect()->route('dashboard.trains.media.index', $train)->with('success', 'Media uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @param  \App\Models\TrainMedia  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Train $train, TrainMedia $media)
    {
        return view('dashboard.trains.media.show', compact('train', 'media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @param  \App\Models\TrainMedia  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Train $train, TrainMedia $media)
    {
        return view('dashboard.trains.media.edit', compact('train', 'media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Train  $train
     * @param  \App\Models\TrainMedia  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Train $train, TrainMedia $media)
    {
        // You might not need validation for updating,
        // but if you allow changing the media file, validate it here
        // ...

        // Handle media update (if needed)
        // ...

        return redirect()->route('dashboard.trains.media.index', $train)->with('success', 'Media updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Train  $train
     * @param  \App\Models\TrainMedia  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Train $train, TrainMedia $media)
    {
        // Handle media deletion
        // ...

        $media->delete();
        return redirect()->route('dashboard.trains.media.index', $train)->with('success', 'Media deleted successfully!');
    }
}
