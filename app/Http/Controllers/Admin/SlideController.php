<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::orderBy("title","asc")->paginate(10);
        return view("slides.index", compact("slides"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("slides.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SlideRequest $request)
    {
        $validated = $request->validated();

        $img_slide = '';
        if($request->image != null)
        {
            $img_slide = time() .'-'.$request->image->getClientOriginalName();
            $request->image->storeAs('/public/images/slides/', $img_slide);
        }

        Slide::create([
            'title'=> $validated['title'],
            'description'   => $validated['description'],
            'image'     => $img_slide,
            'status'    => $validated['status'],
            'link_title'=> $request->link_title,
            'btn_link'  => $request->btn_link,
        ]);

        return redirect()->route('backend.slide.index')->with('success','Slide created successfully.');
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
    public function edit(Slide $slide)
    {
        return view("slides.edit", compact("slide"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SlideRequest $request, Slide $slide)
    {
        $validated = $request->validated();

        $img_slide = $slide->image;
        if($request->image != null)
        {
            $img_slide = time() .'-'.$request->image->getClientOriginalName();
            $request->image->storeAs('/public/images/slides/', $img_slide);
            if(Storage::exists('public/images/slides/'.$slide->image)){
                Storage::delete('public/images/slides/'.$slide->image);
            }
        }

        $data = [
            'title'=> $validated['title'],
            'description'   => $validated['description'],
            'image'     => $img_slide,
            'status'    => $validated['status'],
            'link_title'=> $request->link_title,
            'btn_link'  => $request->btn_link,
        ];

        $slide->update($data);

        return redirect()->route('backend.slide.index')->with('success','Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if(Storage::exists('public/images/slides/'.$slide->image)){
            Storage::delete('public/images/slides/'.$slide->image);
        }

        $slide->delete();
        return redirect()->route('backend.slide.index')->with('success','Slide deleted successfully.');
    }
}
