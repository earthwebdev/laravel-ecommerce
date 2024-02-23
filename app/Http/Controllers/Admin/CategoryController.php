<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('title')->paginate(10);
        return view("category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('title')->get();
        return view("category.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        if($request->slug == null){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug( $request->slug);
        }
        $filename_img = '';
        if($request->image != null){
            $filename_img = time(). '-' . $slug. '.'. $request->image->extension();
            $request->image->storeAs('/public/images/categories/', $filename_img);
        }

        Category::create([
            'title' => $request->title,
            'slug'  => $slug,
            'description'   => $request->description,
            'image'=> $filename_img,
            'status'    => $request->status,
            'is_featured'   =>  $request->is_featured,
            'parent_id'     => $request->parent_id
        ]);

        return redirect()->route('backend.category.index')->with('success','Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::orderBy('title')->get();
        return view("category.edit", compact("categories","category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        if($request->slug == null){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug( $request->slug);
        }
        $filename_img = $category->image;
        if($request->image != null){
            $filename_img = time(). '-' . $slug. '.'. $request->image->extension();
            $request->image->storeAs('/public/images/categories/', $filename_img);

            if(Storage::exists('/public/images/categories/'.$category->image)){
                Storage::delete('/public/images/categories/'.$category->image);
            }
        }
        $category->update([
            'title' => $request->title,
            'slug'  => $slug,
            'description'   => $request->description,
            'image'=> $filename_img,
            'status'    => $request->status,
            'is_featured'   =>  $request->is_featured,
            'parent_id'     => $request->parent_id
        ]);

        return redirect()->route('backend.category.index')->with('success','Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image != null){
            if(Storage::exists('/public/images/categories/'.$category->image)){
                Storage::delete('/public/images/categories/'.$category->image);
            }
        }

        $category->delete();

        return redirect()->route('backend.category.index')->with('success','Category deleted successfully.');
    }
}
