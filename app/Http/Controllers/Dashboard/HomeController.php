<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Train;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contact()
    {
        $contacts = Contact::all();
        return view('dashboard.contact', compact('contacts'));
    }

    public function suggestion()
    {

        $user = auth()->user();

        $userLevel = $user->level; // Get the user's fitness level
        $joinedTrainIds = $user->userTrains->pluck('train_id'); // Get IDs of trains the user has joined

        // 1. Level-Based Recommendations:
        $levelBasedTrains = Train::where('level', $userLevel)->get();

        // 2. Similar Trains:
        $similarTrains = Train::whereIn('muscle_id', function ($query) use ($joinedTrainIds) {
            $query->select('muscle_id')->from('trains')->whereIn('id', $joinedTrainIds);
        })->whereNotIn('id', $joinedTrainIds)->get();

        // 3. Category Exploration:
        $joinedCategories = $user->userTrains->pluck('train.category_id')->unique();
        $unexploredCategories = Category::whereNotIn('id', $joinedCategories)->get();
        $categoryExplorationTrains = Train::whereIn('category_id', $unexploredCategories->pluck('id'))->get();

        // 4. Combine and Filter Recommendations (adjust logic as needed):
        $suggestedTrains = $levelBasedTrains->merge($similarTrains)->merge($categoryExplorationTrains);

        return view('dashboard.suggestion', compact('suggestedTrains'));
    }
}
