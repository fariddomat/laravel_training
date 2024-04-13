<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contact(){
        $contacts=Contact::all();
        return view('dashboard.contact', compact('contacts'));
    }
}
