<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy("title","asc")->paginate(10);
        return view("product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy("title","asc")->get();
        return view("product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        if($request->slug == null){
            $slug = Str::slug($validated["title"]);
        }else{
            $slug = Str::slug($validated["slug"]);
        }
        $pro_image = '';
        if($request->image != null){
            $pro_image = time().'-'.$slug.'.'.$request->image->extension();
            //dd($pro_image);
            $request->image->storeAs('/public/images/products/', $pro_image);
        }

        Product::create([
            'title'         => $validated['title'],
            'slug'          => $slug,
            'price'         => $validated['price'],
            'discount_percentage'   => $request->discount_percentage,
            'description'           => $validated['description'],
            'image'                 => $pro_image,
            'status'                => $request->status,
            'is_featured'           =>  $request->is_featured,
            'category_id'           => $request->category_id
        ]);

        return redirect()->route('backend.product.index')->with('success','Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('title')->get();
        return view("product.edit", compact("categories","product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if($request->slug == null){
            $slug = Str::slug($validated["title"]);
        }else{
            $slug = Str::slug($validated["slug"]);
        }
        $pro_image = $product->image;
        if($request->image != null){
            $pro_image = time().'-'.$slug.'.'.$request->image->extension();
            //dd($pro_image);
            $request->image->storeAs('/public/images/products/', $pro_image);
        }

        $data = [
            'title'         => $validated['title'],
            'slug'          => $slug,
            'price'         => $validated['price'],
            'discount_percentage'   => $request->discount_percentage,
            'description'           => $validated['description'],
            'image'                 => $pro_image,
            'status'                => $request->status,
            'is_featured'           =>  $request->is_featured,
            'category_id'           => $request->category_id
        ];

        $product->update($data);

        return redirect()->route('backend.product.index')->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image != null){
            Storage::delete('/public/images/products/'.$product->image);
        }
        $product->delete();

        return redirect()->route('backend.product.index')->with('success','Product deleted successfully.');

    }
}
