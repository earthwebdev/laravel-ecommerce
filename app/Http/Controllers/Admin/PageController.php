<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('title')->paginate(10);
        return view("pages.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::orderBy('title')->get();
        return view("pages.create", compact("pages"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
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
            $request->image->storeAs('/public/images/pages/', $filename_img);
        }

        Page::create([
            'title' => $request->title,
            'slug'  => $slug,
            'description'   => $request->description,
            'image'=> $filename_img,
            'status'    => $request->status,
        ]);

        return redirect()->route('backend.page.index')->with('success','Page created successfully.');

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
    public function edit(Page $page)
    {
        return view("pages.edit", compact("page"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $validated = $request->validated();

        if($request->slug == null){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug( $request->slug);
        }
        $filename_img = $page->image;
        if($request->image != null){
            $filename_img = time(). '-' . $slug. '.'. $request->image->extension();
            $request->image->storeAs('/public/images/pages/', $filename_img);

            if(Storage::exists('/public/images/pages/'.$page->image)){
                Storage::delete('/public/images/pages/'.$page->image);
            }
        }
        $page->update([
            'title' => $request->title,
            'slug'  => $slug,
            'description'   => $request->description,
            'image'=> $filename_img,
            'status'    => $request->status,
        ]);

        return redirect()->route('backend.page.index')->with('success','Page updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $pages = ['about-us', 'contact-us','return','faqs','terms-and-conditions','privacy-policy'];
        if(in_array($page->slug, $pages)){
            return redirect()->route('backend.page.index')->with('error','Sorry you can not delete this page.');
        }
        if($page->image != null){
            if(Storage::exists('/public/images/pages/'.$page->image)){
                Storage::delete('/public/images/pages/'.$page->image);
            }
        }

        $page->delete();

        return redirect()->route('backend.page.index')->with('success','Page deleted successfully.');
    }
}
