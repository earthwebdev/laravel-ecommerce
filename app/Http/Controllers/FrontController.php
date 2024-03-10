<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function landingPage(){
        return view("front-view");
    }

    public function categoryDetails($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('category-page', compact('category'));
    }

    public function productDetails($slug){

        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product-page', compact('product'));
    }
}
