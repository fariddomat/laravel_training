<?php
// app/Http/Controllers/Dashboard/TrainController.php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Train;
use App\Models\Muscle;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trains = Train::with(['muscle', 'category'])->paginate(10);
        return view('dashboard.trains.index', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muscles = Muscle::all();
        $categories = Category::all();
        return view('dashboard.trains.create', compact('muscles', 'categories'));
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
            'muscle_id' => 'required|exists:muscles,id',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $train = Train::create($request->all());

        return redirect()->route('dashboard.trains.index')->with('success', 'Train created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function show(Train $train)
    {
        return view('dashboard.trains.show', compact('train'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function edit(Train $train)
    {
        $muscles = Muscle::all();
        $categories = Category::all();
        return view('dashboard.trains.edit', compact('train', 'muscles', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Train $train)
    {
        $validator = Validator::make($request->all(), [
            'muscle_id' => 'required|exists:muscles,id',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $train->update($request->all());

        return redirect()->route('dashboard.trains.index')->with('success', 'Train updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function destroy(Train $train)
    {
        $train->delete();
        return redirect()->route('dashboard.trains.index')->with('success', 'Train deleted successfully!');
    }
}
