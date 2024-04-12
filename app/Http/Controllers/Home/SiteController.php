<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {

        return view('welcome');
    }

    public function categories(){
        $categories=Category::all();
        return view('home.categories', compact('categories'));
    }

    public function category($id){
        $category=Category::findOrFail($id);
        return view('home.category', compact('category'));
    }


    public function about(){
        return view('home.about');
    }

    public function contact(){
        return view('home.contact-us');
    }

}