<?php
// app/Http/Controllers/Dashboard/MuscleController.php
namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Muscle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MuscleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muscles = Muscle::paginate(10);
        return view('dashboard.muscles.index', compact('muscles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.muscles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:muscles',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload (if needed)
        if ($request->has('image')) {
            $image = $request->file('image');
            $directory = '/uploads/muscles'; // Replace with the desired directory
            $helper = new ImageHelper;
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, null, 400);
            // Save the full path with name in the database
            $imagePath = $fullPath;
        }

        $muscle = Muscle::create([
            'name' => $request->name,
            'image' => $imagePath ?? null, // Store image path or null
        ]);

        return redirect()->route('dashboard.muscles.index')->with('success', 'Muscle created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function show(Muscle $muscle)
    {
        return view('dashboard.muscles.show', compact('muscle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function edit(Muscle $muscle)
    {
        return view('dashboard.muscles.edit', compact('muscle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muscle $muscle)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:muscles,name,' . $muscle->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload and deletion of old image (if needed)
        if ($request->has('image')) {
            $image = $request->file('image');
            $directory = '/uploads/muscles'; // Replace with the desired directory
            $helper = new ImageHelper;
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, null, 400);
            // Save the full path with name in the database
            $imagePath = $fullPath;
        }

        $muscle->update([
            'name' => $request->name,
            'image' => $imagePath ?? $muscle->image, // Update image path or keep old one
        ]);

        return redirect()->route('dashboard.muscles.index')->with('success', 'Muscle updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muscle $muscle)
    {
        // Handle image deletion (if needed)
        // ...

        $muscle->delete();
        return redirect()->route('dashboard.muscles.index')->with('success', 'Muscle deleted successfully!');
    }
}
