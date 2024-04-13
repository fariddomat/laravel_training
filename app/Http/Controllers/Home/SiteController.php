<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Schedule;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::with('user')->get();
        $coaches = User::role('coach')->get();
        return view('welcome', compact('categories', 'coaches'));
    }

    public function categories()
    {
        $categories = Category::all();


        $schedules = Schedule::with('category')
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get()
            ->groupBy(['start_time', 'day_of_week']);

            // dd($schedules);

        return view('home.categories', compact('categories', 'schedules'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        return view('home.category', compact('category'));
    }

    public function trains(){
        $trains=Train::with(['category', 'muscle'])->get();
        return view('home.trains', compact('trains'));
    }

    public function train($id)
    {
        $train = Train::findOrFail($id);
        return view('home.train', compact('train'));
    }


    public function about()
    {
        $coaches = User::role('coach')->get();
        return view('home.about',compact('coaches'));
    }

    public function contact()
    {
        return view('home.contact-us');
    }

    public function postContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('home');

    }
}
