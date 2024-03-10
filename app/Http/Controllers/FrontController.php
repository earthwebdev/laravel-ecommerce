<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingPage(){
        return view("front-view");
    }

    public function categoryDetails($slug){
        $category = Category::findOrFail('slug', $slug);
        return view('category-page', compact('category'));
    }
}
