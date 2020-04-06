<?php

namespace App\Http\Controllers;

use App\Category;
use App\Domain;
use App\SubCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('welcome',compact('domains','categories','subcategories'));
    }
}
