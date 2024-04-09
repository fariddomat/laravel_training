<?php

// app/Http/Controllers/Dashboard/UserTrainController.php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\UserTrain;
use App\Models\User;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserTrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTrains = UserTrain::with(['user', 'train'])->paginate(10);
        return view('dashboard.user_trains.index', compact('userTrains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $trains = Train::all();
        return view('dashboard.user_trains.create', compact('users', 'trains'));
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
            'user_id' => 'required|exists:users,id',
            'train_id' => 'required|exists:trains,id',
            'date' => 'required|date',
            'time' => 'required', // You might want to specify a time format
            'duration' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userTrain = UserTrain::create($request->all());

        return redirect()->route('dashboard.user_trains.index')->with('success', 'User Train record created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTrain  $userTrain
     * @return \Illuminate\Http\Response
     */
    public function show(UserTrain $userTrain)
    {
        return view('dashboard.user_trains.show', compact('userTrain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTrain  $userTrain
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTrain $userTrain)
    {
        $users = User::all();
        $trains = Train::all();
        return view('dashboard.user_trains.edit', compact('userTrain', 'users', 'trains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTrain  $userTrain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTrain $userTrain)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'train_id' => 'required|exists:trains,id',
            'date' => 'required|date',
            'time' => 'required', // You might want to specify a time format
            'duration' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $userTrain->update($request->all());

        return redirect()->route('dashboard.user_trains.index')->with('success', 'User Train record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTrain  $userTrain
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTrain $userTrain)
    {
        $userTrain->delete();
        return redirect()->route('dashboard.user_trains.index')->with('success', 'User Train record deleted successfully!');
    }
}
